<?php require('params.php'); ?>
<?php require_once('dumper.php'); ?>
<?php // require_once('fpdf/fpdf.php'); ?>
<?php

//Fonctions
function connect() {

    $host = _BD_HOST;
    $user = _BD_USER;
    $pass = _BD_PASS;

    mysql_connect($host, $user, $pass) or die("Erreur de connexion au serveur (fonction.php)");

    selectDb();
}

function selectDb() {

    $bd = _DB;

    mysql_select_db($bd) or die("Erreur de connexion a la base de donnees (fonction.php)");
}

function doQuery($querystring) {

    connect();
    selectDb();

    $query = $querystring;

    $result = mysql_query($query) or die(mysql_errno());

    if (!$result) {

        $m = "Erreur Exe. SQL";

        return $msg;
    }

    return $result;
}

function redirect($url) {
    ?>
    <script language="javascript" type="text/javascript">
        document.location.href = "<?php echo $url ?>";
    </script>
    <?php
}

function begin() {
    doQuery("BEGIN");
}

function commit() {
    doQuery("COMMIT");
}

function rollback() {
    doQuery("ROLLBACK");
}

function ifExist($table, $login) {

    $sql = "
			select count(*) as nb 
			
			from " . $table . "
			
			where login = '" . $login . "' 		
				
			";

    $res = doQuery($sql);
    $ligne = mysql_fetch_array($res) or die(mysql_error());

    $nb = $ligne['nb'];

    if ($nb == 0)
        return 0;
    if ($nb != 0)
        return 1;
}

function makeDateConn($id, $type, $date) {

    if ($type == "sadmin")
        $type = "admin";

    $sql = "update " . $type . " set date_connexion = '" . $date . "' where id = '" . $id . "'";

    //echo $sql;
    $res = doQuery($sql);
}

function limiter_texte($texte, $limite) {
    return substr($texte, 0, $limite);
}

function dateVersBd($d) {

    $date = explode("-", $d);

    return $date[2] . "-" . $date[0] . "-" . $date[1];
}

function dateVersSite($d) {

    $date = explode("-", $d);

    return $date[1] . "-" . $date[2] . "-" . $date[0];
}

function lire_csv($filename, $separateur) {

    if ($FILE = fopen($filename, "r")) {

        while ($ARRAY[] = fgetcsv($FILE, 1024, $separateur));

        fclose($FILE);
        array_pop($ARRAY);

        return $ARRAY;
    }
}

//fonction de gestion
//cette fonction permet de supprimer un ou plusieurs enregistrement dans une table
function Suppression($table, $valeur) {

    $sql = "delete from " . $table . " where id = '" . $valeur . "'";

    $bool = doQuery($sql);

    //supression de l'image principale de l'element
    if ($bool) {
        $tab_valeur = split(',', $valeur);

        foreach ($tab_valeur as $val) {
            $nom_image = $val . "_" . $table;
            foreach (glob("galerie/" . $nom_image . ".*") as $filename) {
                unlink($filename);
            }
        }
    }

    return $bool;
}

function formuler_retour($noms, $valeurs) {
    $chaine = "";
    if (($noms != "") and ( $valeurs != "")) {
        $tab_noms = explode(',', $noms);
        $tab_valeurs = explode(',', $valeurs);

        $chaine = "&";

        for ($i = 0; $i < sizeof($tab_noms); $i++) {
            $chaine .= $tab_noms[$i] . "=" . $tab_valeurs[$i] . "&";
        }

        $chaine = substr($chaine, 0, strlen($chaine) - 1);
    } else {
        $chaine;
    }

    return $chaine;
}

function formuler_where($champs, $valeurs) {

    $chaine = "";
    if (($champs != "") and ( $valeurs != "")) {

        $tab_champs = explode(',', $champs);
        $tab_valeurs = explode(',', $valeurs);


        for ($i = 0; $i < sizeof($tab_champs); $i++) {
            $chaine .= $tab_champs[$i] . "='" . $tab_valeurs[$i] . "' and ";
        }

        $chaine = substr($chaine, 0, strlen($chaine) - 1);
    } else {
        $chaine;
    }

    return $chaine;
}

/* def:pour recuperer la valeur d'un champ a partie de l'identifiant de la table 
  input: la table
  l identifiant de l enregistrement
  et le champs
  output: la valeur du champs */

function getValeurChamp3($table, $id, $champ) {
    $sql = "select " . $champ . "  
			from " . $table . "
			where ID=" . $id . "
			";
    $res = doQuery($sql);
    if (mysql_num_rows($res) == 0) {
        return "";
    } else {
        $ligne = mysql_fetch_array($res) or die(mysql_error());
        return $ligne[$champ];
    }
}

function getValeurChamp2($table, $id, $id_val, $champ) {
    $sql = "select " . $champ . "  
			from " . $table . "
			where " . $id . "=" . $id_val . "
			";
    $res = doQuery($sql);
    $ligne = mysql_fetch_array($res) or die(mysql_error());

    return $ligne[$champ];
}

function getValeurChamp($champ1, $table, $champ2, $valeur) {
    $where = formuler_where($champ2, $valeur);

    $sql = "select " . $champ1 . "  
			from " . $table . "
			where " . $where . " 1=1";
    $res = doQuery($sql);

    if (mysql_num_rows($res) != 0) {
        $ligne = mysql_fetch_array($res) or die(mysql_error());
        return $ligne[$champ1];
    } else
        return "";
}

function getValeurChamp4($champ, $table, $champ1, $val1, $champ2, $val2) {
    $sql = "select " . $champ . "  
			from " . $table . "
			where `" . $champ1 . "`=" . $val1 . " and `" . $champ2 . "`=" . $val2;
    $res = doQuery($sql);


    if (mysql_num_rows($res) != 0) {
        $ligne = mysql_fetch_array($res) or die(mysql_error());
        return $ligne[$champ];
    } else
        return "";
}

//pour ajouter un enregistement a une table
//input: la table concern�
//les champs de la table concern� par l ajout 
//les valeurs de ces champs envoyer par le formulaire ($_REQUEST)
//output: un message de confirmation ou d'erreur		 

function Ajout($table, $tab_champs, $tab_requetes) {

    $champs = "";
    $valeurs = "";

    foreach ($tab_champs as $col) {

        //$col= str_replace('_required','',$colonne);
        if (isset($tab_requetes[$col])) {
            if ($champs == "") {
                $champs = $col;
                $valeurs = "'" . addslashes($tab_requetes[$col]) . "'";
            } else {
                $champs = $champs . ',' . $col;
                $valeurs = $valeurs . ",'" . addslashes($tab_requetes[$col]) . "'";
            }
        }
    }

    $sql = "
				insert into 
				" . $table . "(" . $champs . ") 
				values(" . $valeurs . ")
			";

    $bool = doQuery($sql) or die("ERREUR AJOUT : " . mysql_error());

    /* if ($bool){
      //ajouter une ligne dans la table Historique_Connexion
      $table_modification = "historique_action";
      $_REQUEST['type_utilisateurs'] = $_SESSION['type'];
      $_REQUEST['id_utilisateurs'] = $_SESSION['utilisateurs'];
      $_REQUEST['date'] = time();
      Ajout($table_modification,getNomChamps($table_modification),$_REQUEST);
      } */

    return $bool;
}

//pour modifier un enregistrement dans une table
//input: la table concern�
//les champs de la table concern� par la modification
//les valeurs de ces champs envoyer par le formulaire ($_REQUEST)
//output: un message de confirmation ou d'erreur	
function Modification($table, $tab_champs, $tab_requetes, $id_nom, $id_valeur) {
    $champs_val = "";
    foreach ($tab_champs as $col) {
        if (isset($tab_requetes[$col])) {
            if ($champs_val == "") {
                //$champs_val=$col."='".addslashes($tab_requetes[$col])."',";

                $v = $tab_requetes[$col];

                if ($col != "id") {
                    if ($col == "password")
                        $champs_val = $col . "='" . addslashes(md5($v)) . "',";
                    else
                        $champs_val = $col . "='" . addslashes($v) . "',";
                }
            }
            else {

                $champs_val = $champs_val . $col . "='" . addslashes($tab_requetes[$col]) . "',";
            }
        }
    }
    //pour eleminer la ',' � la fin de la chaine de caractere
    $champs_mod = substr($champs_val, 0, -1);

    //pr�paration de la clause where
    $tab_id_nom = split(',', $id_nom);
    $tab_id_valeur = split(',', $id_valeur);

    for ($i = 0; $i < sizeof($tab_id_valeur); $i++) {
        if ($where == "") {
            $where = $tab_id_nom[$i] . "='" . addslashes($tab_id_valeur[$i]) . "'";
        } else {
            $where = $where . " and " . $tab_id_nom[$i] . "='" . addslashes($tab_id_valeur[$i]) . "'";
        }
    }

    if ($champs_mod != '') {
       $sql = "update " . $table . " set " . $champs_mod . " where " . $where . " ";
    }
    return $bool = doQuery($sql) or die("ERREUR MODIFICATION CAT : " . mysql_error());
}

//cette fonction permet test� si une valeur existe ou non dans une table
function ExisteValeur($table, $champ, $valeur, $exep) {
    //recuper� les valeurs existantes
    $query = "select * from " . $table . " where " . $champ . "='" . $valeur . "' and " . $champ . " <> '" . $exep . "' ";
    $result = doQuery($query);

    //traitement de l'existance d'un enregistrement
    //echo mysql_num_rows($result);

    if (mysql_num_rows($result) != 0) {
        return true;
    } else
        return false;
}

//cette fonction permet de r�cuperer le nom d'un seul champd'un table
function getChamp($table, $champ) {
    //recuperer lesnom du cham d'une table
    $query = "SHOW COLUMNS FROM " . $table . " LIKE '" . $champ . "'";
    $result = doQuery($query);

    //traitement de l'existance d'un enregistrement
    if (mysql_num_rows($result) != 0) {
        return true;
    } else
        return false;
}

//cette fonction permet de r�cuperer les nom des champs d'un table
//input: une table sql
//output: un tableau avec les nom des champs

function getNomChamps($table) {
    //recuperer tous les nom des champs d'une table
    $query = 'SHOW COLUMNS FROM ' . $table;
    $result = doQuery($query);

    //mettre les nom des champs sous form de tableau
    for ($i = 0; $i < mysql_num_rows($result); $i++) {
        $cols[] = mysql_result($result, $i);
    }
    return $cols;
}

function datediff($debut, $fin) {
    $diff = $debut - $fin;

    return round($diff / (60 * 60 * 24));
}

/* fonction permet de modifier pour un ou plusieurs enregistrement la valeurs d un champs
  input: table
  le mon du champs que nous voulons modifier
  la nouvelle valeur
  le ou les enregistrements concern�es
  output: un message de confirmation ou d'erreur
 */

function ModifValChamps($table, $champ, $valeur, $ids) {
    $sql = "update " . $table . " set 
				  
			  " . $champ . "='" . $valeur . "'			  
			  where id in ('" . $ids . "')";

    //echo $sql;

    return $bool = doQuery($sql) or die("ERREUR MODIFICATION ETAT : " . mysql_error());
}

/* fonction pour uploader une image dans une table
  input : table
  valeur: le fichier envoy� souqs forme array
  id: l'identifiant de l'enregistrement consern�
  output : message de confirmation ou d'erreur
 */

function upload_image($table, $valeur, $id) {
    if ($valeur['tmp_name'] != '') {
        $image_tmp = $valeur['tmp_name'];
        $extention = get_image_extention($image_tmp);
        $nom_image = $id . '_' . $table . $extention;
        move_uploaded_file($image_tmp, 'galerie/' . $nom_image);
        return ModifValChamps($table, 'image', $nom_image, $id);
    }
}

/* function qui permet de recuperer l'extention d'un fuchier image
  input :nom image
  output: extention de l'image
 */

function get_image_extention($image) {
    list($largeur, $hauteur, $type, $attr) = getimagesize($image);
    if ($type == 1) {
        $extention = ".gif";
    }
    if ($type == 2) {
        $extention = ".jpg";
    }
    if ($type == 3) {
        $extention = ".png";
    }
    return $extention;
}

/* fonction d'affichage de liste simple

 */

function get_list_simple($tableau, $nom_champs) {
    ?>
    <select name="<?php echo $nom_champs ?>" id="<?php echo $nom_champs ?>">
        <option value="">- -  - - - -  - - _</option>
        <?php foreach ($tableau as $val) { ?>
            <option value="<?php echo $val ?>"><?php echo formater_texte($val) ?></option>
        <?php } ?>
    </select>
    <?php
}

/* foncion de liste
  input table concern�
  champ qu"on veux list�
  condition la condition where ou cas ou nous voulons selectionner les enregistrement
 */

function get_list($table, $id_modif, $champ, $condition, $action) {
    if ($action == 'selection') {
        $act = "onChange='frm.submit()'";
        $option_vide = '<option value=""> - -  - - __ </option>';
    } else
        $act = '';
    if ($condition != '') {
        $cond = " where " . $condition;
    } else {
        $cond = "";
    }

    $sql = "select * from " . $table . $cond . " order by " . $champ;
    $res = doQuery($sql);
    ?>
    <select name="id_<?php echo $table ?>" id="id_<?php echo $table ?>" <?php echo $act ?> >
        <?php echo $option_vide ?>
        <?php
        $s = "";
        while ($ligne = mysql_fetch_array($res)) {
            if (isset($id_modif)) {
                if ($id_modif == $ligne['id']) {
                    //return $ligne['id'];
                    $s = 'selected="selected"';
                }
            }
            ?>	

            <option value="<?php echo $ligne['id'] ?>" <?php echo $s ?>> 
                <?php echo formater_texte($ligne[$champ]) ?> 
            </option>

            <?php
            $s = "";
        }
        ?>
    </select>
    <?php
    return mysql_num_rows($res);
}

//fonction test
function get_table_valeur($table, $champs, $criteres) {
    if ($criteres != '') {
        $crit = "where " . $criteres;
    } else
        $crit = "where 1=1";

    $sql = "select * from " . $table . " " . $crit;

    $res = doQuery($sql);
    $i = 0;
    while ($ligne = mysql_fetch_array($res)) {

        foreach ($champs as $champ) {
            $valeurs[$i][$champ] = $ligne[$champ];
        }
        $i++;
    }
    return $valeurs;
}

//fonction d'affichage du th d'un tableau
function affichage_th($champs) {
    ?>
    <th class="case"> <input type="checkbox" name="all" onClick="cocherTout()" /> </th>
    <?php
    for ($i = 0; $i < sizeof($champs); $i++) {
        //foreach($champs as $champ){
        ?>
        <th><?php echo $champs[$i] ?></th>
        <?php
    }
    ?>
    <th> <?php echo _OP ?></th>
    <?php
}


/* affichage des titres titre
  input: l url de l icone
  le texte du titre */

function affichage_titre($url, $libelle) {
    if ($url == '') {
        $url = 'image_default.jpg';
    }
    ?>
    <p id="titre">
        <img src="<?php echo $url; ?> " />
        &nbsp; 
        <?php echo $libelle; ?>
    </p>
    <?php
}

/* affichage des operations
  input: le lien lien ver le quel dirige cette operation
  l action javascript onclick executer par l'operation
  l'url de l'icone de l'operation
  le libelle de l'operation
 */

function affichage_operation($lien, $action, $url, $libelle) {
    if ($lien == '') {
        $lien = '#';
    }
    if ($url == '') {
        $url = 'image_default.jpg';
    }
    ?>
    <a href="<?php echo $lien; ?>" onclick="<?php echo $action; ?>">
        <img src="<?php echo $url ?>" />
        &nbsp;
        <?php echo $libelle ?>
    </a>
    <?php
}

function getNb($table, $champ, $id) {

    //Formuler champ=valeur and ....
    $tab_champs = explode(',', $champ);
    $tab_valeurs = explode(',', $id);

    $chaine = "";

    for ($i = 0; $i < sizeof($tab_champs); $i++) {
        $chaine .= $tab_champs[$i] . "='" . $tab_valeurs[$i] . "' and ";
    }
    $chaine = substr($chaine, 0, strlen($chaine) - 5);

    //
    $sql_get = "
			select count(*) as nb 
			
			from " . $table . "
			
			where " . $chaine;

    $res_get = doQuery($sql_get);
    $ligne_get = mysql_fetch_array($res_get) or die(mysql_error());

    return $nb = $ligne_get['nb'];
}

function getSum($table, $colonne, $champ, $id) {

    //Formuler champ=valeur and ....
    $tab_champs = explode(',', $champ);
    $tab_valeurs = explode(',', $id);

    $chaine = "";

    for ($i = 0; $i < sizeof($tab_champs); $i++) {
        $chaine .= $tab_champs[$i] . "='" . $tab_valeurs[$i] . "' and ";
    }
    $chaine = substr($chaine, 0, strlen($chaine) - 5);

    //
    //echo "- -  - - - -  - - <br>";
    $sql_get = "
			select sum(" . $colonne . ") as total 
			
			from " . $table . "
			
			where " . $chaine;
    //echo "<br>- -  - - - -  - - <br><br>";

    $res_get = doQuery($sql_get);
    $ligne_get = mysql_fetch_array($res_get) or die(mysql_error());

    if ($ligne_get['total'] == "")
        return "0";
    return $ligne_get['total'];
}

function getTimeByDate($date, $sep) {

    $tab = explode($sep, $date);

    $annee = $tab[2];
    $mois = $tab[0];
    $jour = $tab[1];

    return mktime(0, 0, 0, $mois, $jour, $annee);
}

//fonction de pagination
//recuperer le nombre de page en fonction du nombre de message que nous avons d�fini

function getNbrPages($requete, $messagesParPage) {
    connect();
    selectDb();
    $retour_total = doQuery($requete) or die("ERREUR : " . mysql_error());
    //Nous r�cup�rons le contenu de la requ�te dans $retour_total
    $donnees_total = mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
    $total = $donnees_total['total']; //On r�cup�re le total pour le placer dans la variable $total.
    //Nous allons maintenant compter le nombre de pages.
    $nombreDePages = ceil($total / $messagesParPage);
    return $nombreDePages;
}

//recuperer le numero de la page actuelle
function getPageActuelle($nombreDePages) {
    if (isset($_GET['page'])) { // Si la variable $_GET['page'] existe...
        $pageActuelle = intval($_GET['page']);

        if ($pageActuelle > $nombreDePages) {
            // Si la valeur de $pageActuelle (le num�ro de la page) est plus grande que $nombreDePages...
            $pageActuelle = $nombreDePages;
        }
    } else { // Sinon
        $pageActuelle = 1; // La page actuelle est la n�1    
    }
    return $pageActuelle;
}

//affichage du systeme de navigation
function AffichagePagination($page, $pageActuelle, $nombreDePages) {
    echo '<p align="center">'; //Pour l'affichage, on centre la liste des pages
    //precedent
    if ($pageActuelle > 1) { //Si il s'agit de la page actuelle...
        $j = $pageActuelle - 1;
        echo ' <a href="' . $page . 'page=' . $j . '"><< ' . formater_texte("Page Pr�c�dente") . '</a> ';
        //echo ' <a href="'.$page.','.$j.'.html"><< '. formater_texte("Page Pr�c�dente") .'</a> ';
    }


    //fin precedent	 
    if ($nombreDePages != 1) {
        for ($i = 1; $i <= $nombreDePages; $i++) { //On fait notre boucle
            //On va faire notre condition
            if ($i == $pageActuelle) { //Si il s'agit de la page actuelle...
                echo ' [ ' . $i . ' ] ';
            } else { //Sinon...
                echo ' <a href="' . $page . 'page=' . $i . '">' . $i . '</a> ';
                //echo ' <a href="'.$page.','.$i.'.html">'.$i.'</a> ';
            }
        }
    }
    //suivant
    if ($pageActuelle < $nombreDePages) { //Si il s'agit de la page actuelle...
        $j = $pageActuelle + 1;
        echo ' <a href="' . $page . 'page=' . $j . '">' . formater_texte("Page Suivante") . ' >></a> ';
        //echo ' <a href="'.$page.','.$j.'.html">'. formater_texte("Page Suivante") .' >></a> ';
    }

    //fin suivant	 
    echo '</p>';
}

//cette fonction permet de r�cuperer la date du jour suivant (yyyy/mm/jj) � une date donn�	
function date_jour_suivant($date_a) {
    $tab = split("/", $date_a);
    $annee = intval($tab[0]);
    $mois = intval($tab[1]);
    $jour = intval($tab[2]);
    //recupererle nbr de jour du mois en cours
    if ($mois == 04 or $mois == 06 or $mois == 09 or $mois == 11) {
        $nbr_jour = 30;
    } else if ($mois == 02) {
        if ($annee % 4 == 0) {
            $nbr_jour = 29;
        } else {
            $nbr_jour = 28;
        }
    } else {
        $nbr_jour = 31;
    }
    //echo $nbr_jour;
    $annee = sprintf("%02d", $annee);
    $mois = sprintf("%02d", $mois);
    if ($jour < $nbr_jour) {

        $jour_suivant = sprintf("%02d", $jour + 1);
        $date_suivante = $annee . "/" . $mois . "/" . $jour_suivant;
    } else if ($jour == $nbr_jour and $mois == 12) {
        $annee_suivante = sprintf("%02d", $annee + 1);
        $date_suivante = $annee_suivante . "/01/01";
    } else {
        $mois_suivant = sprintf("%02d", $mois + 1);
        $date_suivante = $annee . "/" . $mois_suivant . "/01";
    }
    return $date_suivante;
}

function formater_texte($t) {
    //return htmlentities(stripslashes($t));
    return htmlentities(stripslashes($t));
}

function formater_texte2($t) {
    return html_entity_decode(stripslashes($t));
}

function envoi_mail($dest, $sujet, $message, $page) {

//envoyer un msg de confirmation par mail
    $headers = 'From: "SOFTWARE"<a.maresham@gmail.com>' . "\n";
    $headers .= 'Reply-To: a.maresham@gmail.com' . "\n";
    $headers .= 'Content-Type: text/html; charset="iso-8859-1"' . "\n";
    $headers .= 'Content-Transfer-Encoding: 8bit';

    $msg = '

<html>
	<head>
		<title>' . $sujet . '</title>
	</head>
	
	<body>
		' . $message . '
	</body>
</html>';

    if (mail($dest, $sujet, $message, $headers)) {
        $msg = _ENVOI_OK;
    } else {
        $msg_err = _ENVOI_NOK;
    }

    redirect($page . "?msg=" . $msg . "&err=" . $msg_err);
}

function getTabList($tab, $nom, $valeur, $change, $libelle) {
    ?>
    <div class="controls">
        <select name = "<?php echo $nom ?>" <?php echo $change ?> id="<?php echo $libelle ?>_required">	

            <option value="">- -  - - -</option>

            <?php
            foreach ($tab as $c => $v) {

                $s = "";

                if ($valeur == $c) {
                    $s = "selected";
                }
                ?>
                <option value="<?php echo $c ?>" <?php echo $s ?>>
                    <?php echo formater_texte($v) ?>
                </option>

                <?php
            }
            ?>

        </select>
    </div>    
    <?php
}

function getTableList($table, $nom, $valeur, $champ, $change, $where, $libelle) {
    $sql = "select * from " . $table . " " . $where . " order by " . $champ;
    $res = doQuery($sql);
    ?>
    <div class="controls">
        <select name="<?php echo $nom ?>" <?php echo $change ?> 
                id="<?php echo $libelle ?>_required" class="form-control">

            <option value="">- -  - - - - - - - - -</option>

            <?php
            while ($ligne = mysql_fetch_array($res)) {

                $s = "";

                if ($valeur == $ligne['id']) {
                    $s = "selected";
                }
                ?>
                <option value="<?php echo $ligne['id'] ?>" <?php echo $s ?>>
                    <?php echo $ligne[$champ] ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
    <?php
}

function getTableList5($table, $nom, $valeur, $champ1, $champ2, $champ3, $change, $where, $libelle) {

    $sql = "select * from " . $table . " " . $where;
    $res = doQuery($sql);
    ?>
    <div class="controls">
        <select name="<?php echo $nom ?>" <?php echo $change ?> 
                id="<?php echo $libelle ?>_required" class="form-control">

            <option value="">- -  - - _</option>

            <?php
            while ($ligne = mysql_fetch_array($res)) {

                $s = "";

                if ($valeur == $ligne['id']) {
                    $s = "selected";
                }
                ?>
                <option value="<?php echo $ligne['id'] ?>" <?php echo $s ?>>
                    <?php echo $ligne[$champ1] . " : " . $ligne[$champ2] . " " . $ligne[$champ3]; ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
    <?php
}

function getTableList2($table, $nom, $valeur, $champs, $value, $change, $where, $libelle) {

    $sql = "select * from " . $table . " " . $where . " order by " . $champs;
    $res = doQuery($sql);
    ?>
    <div class="controls">
        <select name="<?php echo $nom ?>" <?php echo $change ?> 
                id="<?php echo $libelle ?>_required">

            <option value="">- -  - - _</option>

            <?php
            while ($ligne = mysql_fetch_array($res)) {

                $s = "";

                if ($valeur == $ligne[$value]) {
                    $s = "selected";
                }
                ?>
                <option value="<?php echo $ligne[$value] ?>" <?php echo $s ?>>
                    <?php
                    $tab_champs = explode(',', $champs);

                    $chn = '';
                    foreach ($tab_champs as $v) {
                        $chn .= $ligne[$v] . " => ";
                    }
                    echo $chn = substr($chn, 0, strlen($chn) - 4);
                    ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
    <?php
}

function resize_picture($fichier, $maxWidth, $maxHeight, $extras) {

    # Passage des parametres dans la table : imageinfo
    $imageinfo = getimagesize("$fichier");
    $iw = $imageinfo[0];
    $ih = $imageinfo[1];

    # Parametres : Largeur et Hauteur souhaiter $maxWidth, $maxHeight
    # Calcul des rapport de Largeur et de Hauteur
    $widthscale = $iw / $maxWidth;
    $heightscale = $ih / $maxHeight;
    $rapport = $ih / $widthscale;

    # Calul des rapports Largeur et Hauteur a afficher
    if ($rapport < $maxHeight) {
        $nwidth = $maxWidth;
    } else {
        $nwidth = $iw / $heightscale;
    }
    if ($rapport < $maxHeight) {
        $nheight = $rapport;
    } else {
        $nheight = $maxHeight;
    }

    # Affichage
    echo " <img src=$fichier width=\"$nwidth\" height=\"$nheight\" $extras>";
}

function formater_constantes($const) {

    $tab = explode(" ", $const);

    $chaine = "";
    foreach ($tab as $c) {
        $chaine .= constant($c) . " ";
    }

    return trim($chaine);
}

function dateToTime($date, $sep) {
    $tab_d = explode($sep, $date);

    $annee = $tab_d[2];
    $jour = $tab_d[1];
    $mois = $tab_d[0];


    return mktime(0, 0, 1, $mois, $jour, $annee);
}

function formater_date($date, $sep) {

    $tab_d = explode($sep, $date);

    $annee = $tab_d[2];
    $mois = $tab_d[1];
    $jour = $tab_d[0];

    $hr = date("G");
    $mint = date("i");
    $sec = date("s");

    return mktime($hr, $mint, $sec, $mois, $jour, $annee);
}

function formater_montant($montant) {
    $chaine = '';

    $tab_mnt = explode('.', $montant);

    for ($i = 1; $i <= strlen($tab_mnt[0]); $i++) {

        $car = substr($tab_mnt[0], -$i, 1);

        if ($i % 3 == 0)
            $chaine .= $car . ' ';
        else
            $chaine .= $car;
    }

    for ($j = 1; $j <= strlen($chaine); $j++) {
        $c .= substr($chaine, -$j, 1);
    }

    $dec = $tab_mnt[1];
    if ($tab_mnt[1] == '')
        $dec = "00";

    return $c . '.' . $dec;
}

function stripAccents($string) {
    return strtr($string, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function no_accent($str_accent) {
    $pattern = Array("/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/");
    // notez bien les / avant et apr�s les caract�res
    $rep_pat = Array("e", "e", "e", "c", "a", "a", "i", "i", "u", "o");
    $str_noacc = preg_replace($pattern, $rep_pat, $str_accent);
    return $str_noacc;
}

/* * ******************************** GESTION DES PERSONNEL ********************************* */



/* TODO : calculer la some des credit : cette fonction est just copie de avance */

function getSommeCredit($id, $start, $end) {
    $sql = "select SUM(MONTANT) as total from  avances where type='credit' and ID_PERSONNELS=" . $id . " and DATE_EMPREINTE between DATE_FORMAT('" . $start . "', '%Y-%m-%d') and  DATE_FORMAT('" . $end . "', '%Y-%m-%d')";
    $res = doQuery($sql);
    $sommeMontant = 0;
    while ($ligne = mysql_fetch_array($res)) {
        $sommeMontant += $ligne['total'];
    }
    return 100;
}

function getMontant($id, $start, $end) {
    $typeEmploye = getValeurChamp('TYPE', 'personnels', 'ID', $id);
    $nbrHeur = getSommeHeurN($id, $start, $end) + getSommeHeurS($id, $start, $end);
    if ($typeEmploye == "Salarie") {
        return getValeurChamp('SALAIRE_MENSUELLE', 'personnels', 'ID', $id);
    } else {
        $tarifJournaliere = getValeurChamp('TARIF_JOURNALIERS', 'personnels', 'ID', $id);
        return ($tarifJournaliere * ($nbrHeur / 9));
    }
}

function getNetAPayer($id, $start, $end) {
    $montant = getMontant($id, $start, $end);
    $avances = getSommeAvance($id, $start, $end);
    $credits = getSommeCredit($id, $start, $end);
    return $montant + $credits - $avances;
}

function getDateExport($fileName) {
    $r = str_replace("gestion_personnel-", "", $fileName);
    $r = str_replace(".sql", "", $r);
    $tab = explode("-", $r);
    return $tab[0] . "/" . $tab[1] . "/" . $tab[2] . "  " . $tab[3] . " h " . $tab[4] . " min " . $tab[5] . " s";
}

function exportDatabase() {
    try {
        $world_dumper = Shuttle_Dumper::create(array(
                    'host' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'db_name' => 'pointages_software',
        ));
        $date = date("d-m-Y-h-i-s");
        $world_dumper->dump('backup/pointages_software-' . $date . '.sql');
    } catch (Shuttle_Exception $e) {
        echo "Couldn't dump database: " . $e->getMessage();
    }
}

function importerDatabase($file) {
    $connect = mysqli_connect("localhost", "root", "", "pointages_software");
    $output = '';
    $count = 0;
    $file_data = file($file);
    $m = "";
    foreach ($file_data as $row) {
        $start_character = substr(trim($row), 0, 2);
        if ($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '') {
            $output = $output . $row;
            $end_character = substr(trim($row), -1, 1);
            if ($end_character == ';') {
                if (!mysqli_query($connect, $output)) {
                    $count++;
                }
                $output = '';
            }
        }
    }
    if ($count > 0) {
        $m = 'There is an error in Database Import';
    } else {
        $m = 'Database Successfully Imported';
    }
    redirect("database.php?m=" . $m);
    return $m;
}

function getIdChantier($personnels, $idChantier, $idMarche) {
    if (getValeurChamp('admin', 'personnels', 'ID', $personnels) == 1) {
        return 0;
    } else if (!empty($idChantier) && $idChantier > 0) {
        return $idChantier;
    } else if (!empty($idMarche) && $idMarche > 0) {
        $req = "select ID from chantiers where ID_MARCHE=" . $idMarche . " 
		and ID in (select ID_CHNATIERS from personnels_chantiers where ID_PERSONNELS=" . $personnels . " and DATE_SORTIE is null)";
        $res = doQuery($req);
        $id = 0;
        while ($ligne = mysql_fetch_array($res)) {
            $id = $ligne['id'];
        }
        return $id;
    }
    return "";
}


/*function nombreJour($d1,$d2){
    $datetime1 = new DateTime($d1);
    $datetime2 = new DateTime($d2);
    $interval = $datetime2->diff($datetime1);
    return $interval->format('%a days');
}*/

function nombreJour($datedeb,$datefin){
    $nb_jours=0;
    $dated=explode('-',$datedeb);
    $datef=explode('-',$datefin);
    if(count($dated)==3 && count($datef)==3){
        $timestampcurr=mktime(0,0,0,$dated[1],$dated[2],$dated[0]);
        $timestampf=mktime(0,0,0,$datef[1],$datef[2],$datef[0]);
        while($timestampcurr<=$timestampf){
     
          if((date('w',$timestampcurr)!=0)&&(date('w',$timestampcurr)!=6)){
            $nb_jours++;
          }
          $timestampcurr=mktime(0,0,0,date('m',$timestampcurr),(date('d',$timestampcurr)+1)   ,date('Y',$timestampcurr));
        }
        return $nb_jours;
    }else{
        return 0;
    }
}
function getNombreHeur($currentMonth,$year,$month){
    $nbrJour =0;
    if($currentMonth==1){
        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
        $datefin = date('Y-m-d');
        $nbrJour = nombreJour($datedebut,$datefin);
    }else if(!empty($year) && !empty($month)){
        $datedebut = date('Y-m-d',strtotime($year."-".$month."-01"));
        $datefin = date('Y-m-t',strtotime($year."-".$month."-20"));
        if(date('Y-m')==$year."-".$month){
            $datefin= date('Y-m-d');
        }

        $nbrJour = nombreJour($datedebut,$datefin);
    } else {
        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
        $datefin = date('Y-m-d');
        $nbrJour = nombreJour($datedebut,$datefin);
    }
    return ($nbrJour*8);
}

function getRapportMensuelle($user,$currentMonth,$year,$month,$time){
    
    if(!empty($user)) {
        $nbrHeur = getNombreHeur($currentMonth,$year,$month)-8;
        // number of days after 01-07-2018
        $conge = getNombreJourConge($user,$currentMonth,$year,$month,"2018-11-01")*8;
        // number of days after 01-07-2018
        $jourFerie = getNombreHeurJourFerie($currentMonth,$year,$month,false,"2018-11-01");
       
        $tabH= explode(":", getHourFromMinutes($time));
       
        if(count($tabH)==3){
            // +8 just to count today
            $h = (int)$tabH[0]+(int)$conge+(int)$jourFerie-$nbrHeur;
            $m = (int) $tabH[1];
            if($h<0 && $m!=0) {
                $h=$h+1;
                $m = 60-$m;
            }
            return $h.":".($m>9?$m:'0'.$m).":00";            
        }else
            return 0;
    } else {
        return 0;
    }
}

function getMinDate($user){
    $req = "select min(date_pointage) as minDate from pointages where id_personnels=".$user;
     $res = doQuery($req);
    $nb = mysql_num_rows($res);
    $minDate = "";
    while ($ligne = mysql_fetch_array($res)) {
        $minDate=$ligne['minDate'];
    }
    return $minDate;
}

function getSumHours($datefin,$datedebut,$user){
    $sql = "SELECT SUM(TIMESTAMPDIFF(SECOND, `timeIn`,`timeOut`))  as sumTime  
    FROM pointages
    WHERE id_personnels=".$user." and date_pointage between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')";
    $res = doQuery($sql);
    $sumTime=0;
    $nb = mysql_num_rows($res);
    while ($ligne = mysql_fetch_array($res)) {
            $sumTime=$ligne['sumTime'];
        }
    return $sumTime;
}


function getRapport($user,$currentMonth,$year,$month){
    if(!empty($user)) {
        
        // get first date for the selected user (select min date from pointage)
        $minDate = getMinDate($user);
        // get the current date
        $currentDate = date("Y-m-d");

        //number of days in Hours 
        $nb=nombreJour($minDate, $currentDate);
        // -1 just to not count today
        // Sum of free days in Hours
        $sumOffreeDays = getNombreHeurJourFerie($currentMonth,$year,$month,true,"2018-11-01");

        // Sum of Holidays in Hours
         $sumOfHolidays = getNombreJourCongeTotal($user,$year)*8;

         $SumHoursBetweenMinDateAndCurrentDate = $nb*8-$sumOfHolidays-$sumOffreeDays-8;
        
        //sumOfWorkedHours 
        $sumOfWorkedHours = getSumHours($currentDate,$minDate,$user);


        // calulcte the result workedHours+freeDays+holidays - numberOfDaysIn hours
        $tabH= explode(":", getHourFromMinutes($sumOfWorkedHours));
        $result = "";
        if(count($tabH)==3){
            $h = (int)$tabH[0] - (int)$SumHoursBetweenMinDateAndCurrentDate;
            $m = (int) $tabH[1];
     if($h<0 && $m!=0) {
                $h=$h+1;
                $m = 60-$m;
            }
            return $h.":".($m>9?$m:'0'.$m).":00";        }
        return $result;
    }
    else {
        return 0;
    }
}


function getNombreJourCongeTotal($user,$year){
    $sum = 0;
    if(empty($year)){        
        $year = date("Y");
    }
    $datedebut = date('Y-m-d',strtotime($year."-01-01"));
    $datefin= date('Y-m-d');        
    $sql = "SELECT * FROM conges WHERE id_personnels=".$user." and date_debut>= DATE_FORMAT('2018-11-01', '%Y-%m-%d')
    and ( date_debut between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_fin between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_debut > DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and date_fin < DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_debut < DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and date_fin > DATE_FORMAT('" . $datefin. "', '%Y-%m-%d'))";
    $res = doQuery($sql);
    $tab = array();
    $nb = mysql_num_rows($res);

    $i=0;
    while ($ligne = mysql_fetch_array($res)) {
        $tab[$i]["d1"]=$ligne['date_debut'];
        $tab[$i]["d2"]=$ligne['date_fin'];
        $tab[$i]["id"]=$ligne['id'];
        $i++;
    }

    for($i=0;$i<$nb;$i++){
        $d1 = $datedebut>$tab[$i]["d1"] ? $datedebut : $tab[$i]["d1"];
         $d2 = $datefin<$tab[$i]["d2"] ? $datefin : $tab[$i]["d2"];
        $sum = $sum + nombreJour($d1,$d2);
    }

    return $sum;
}

function getNombreJourConge($user,$currentMonth,$year,$month,$startDay){
     

    $sum = 0;
    $w = "";
    if(!empty($startDay)){
        $w = " and date_debut >= DATE_FORMAT('" . $startDay . "', '%Y-%m-%d')"; 
    }
    if(!empty($currentMonth) || !empty($year) || !empty($month) ){
        
            $datedebut = !empty($currentMonth) ? date('Y-m-d',strtotime('first day of this month', time())) : $year."-".$month."-01";
            $datefin = !empty($currentMonth) ? date('Y-m-d',strtotime('last day of this month', time())) : date('Y-m-t',strtotime($year."-".$month."-05"));
            if(date('Y-m')==$year."-".$month){
                $datefin= date('Y-m-d');
            }
    }else{
        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
        $datefin = date('Y-m-d');        
    }
    $sql = "SELECT * FROM conges WHERE id_personnels=".$user.$w." 
    and ( date_debut between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_fin between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_debut > DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and date_fin < DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')
     or date_debut < DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and date_fin > DATE_FORMAT('" . $datefin. "', '%Y-%m-%d'))";
    $res = doQuery($sql);
    $tab = array();
    $nb = mysql_num_rows($res);

    $i=0;
    while ($ligne = mysql_fetch_array($res)) {
        $tab[$i]["d1"]=$ligne['date_debut'];
        $tab[$i]["d2"]=$ligne['date_fin'];
        $tab[$i]["id"]=$ligne['id'];
        $i++;
    }
    for($i=0;$i<$nb;$i++){
        $d1 = $datedebut>$tab[$i]["d1"] ? $datedebut : $tab[$i]["d1"];
         $d2 = $datefin<$tab[$i]["d2"] ? $datefin : $tab[$i]["d2"];
        $sum = $sum + nombreJour($d1,$d2);
    }

    return $sum;
}

/* TODO  check years*/
function getNombreHeurJourFerie($currentMonth,$year,$month,$global,$startDay){
    
    $w = "";
    if(!empty($startDay)){
        $w = " and dateDebut >= DATE_FORMAT('" . $startDay . "', '%Y-%m-%d') "; 
    }

    $where ="";
    if ($global) {
        $where = " and extract(year from dateDebut) =".date("Y");
    } else {
        if(!empty($year) && !empty($month) ){
            $where = " and extract(year from dateDebut) =".$year." and extract(month from dateDebut) ='".$month."'";
        }elseif (!empty($currentMonth)) {
            $where = " and extract(year from dateDebut) =".date("Y")." and extract(month from dateDebut) ='".date("m")."'";
        }
    }
    $req = "select SUM(TO_DAYS( datefin ) - TO_DAYS( datedebut )) AS tot  from freeDays where 1=1 ".$w.$where;
    $res = doQuery($req);
    $tab = array();
    $nb = mysql_num_rows($res);

    $nbrJour =0;
    while ($ligne = mysql_fetch_array($res)) {
        $nbrJour=$ligne['tot'];
    }
    return $nbrJour*8 ;
}

//TODO
function nombreJourPerUser($user,$currentMonth,$year,$month){
    if($user){
        if(!empty($currentMonth) || !empty($year) || !empty($month) ){
            
                $datedebut = !empty($currentMonth) ? date('Y-m-d',strtotime('first day of this month', time())) : $year."-".$month."-01";
               //TODO VERIFY LAST DAY IN SELECTED MONTH

                $datefin = !empty($currentMonth) ? date('Y-m-d') : date('Y-m-t',strtotime($year.'-'.$month.'-04'));
                if(date('Y-m')==$year."-".$month){
                    $datefin= date('Y-m-d');
                }
        }else{
            $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
            $datefin = date('Y-m-d');        
        }

        $sql = "SELECT count(id) as total FROM pointages WHERE id_personnels=".$user." and date_pointage between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')";
        $res = doQuery($sql);
        $tab = array();
        $nb = mysql_num_rows($res);
        $resultat = 0;
        $i=0;
        while ($ligne = mysql_fetch_array($res)) {
            $resultat=$ligne['total'];
        }
        return (int) $resultat;
    }
}
function getSommeNombreHeurN($where) {
 $sql = "SELECT SUM(TIMESTAMPDIFF(second, `timeIn`,`timeOut`)) AS total
FROM pointages where 1=1  ".$where;
    $res = doQuery($sql);
    $nbrHeur = 0;
    while ($ligne = mysql_fetch_array($res)) {
         $nbrHeur=$ligne['total'];

    }
    return getHourFromMinutes($nbrHeur);
}

function nombreJour2($currentMonth,$year,$month){
        if(!empty($currentMonth) || !empty($year) || !empty($month) ){
            
                $datedebut = !empty($currentMonth) ? date('Y-m-d',strtotime('first day of this month', time())) : $year."-".$month."-01";

                $datefin = !empty($currentMonth) ? date('Y-m-d') : date('Y-m-t',strtotime($year.'-'.$month.'-04'));
                if(date('Y-m')==$year."-".$month){
                    $datefin= date('Y-m-d');
                }
        }else{
            $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
            $datefin = date('Y-m-d');        
        }
        return nombreJour($datedebut,$datefin);
}

function nombreJour3($userId,$currentMonth,$year,$month){
        if(!empty($currentMonth) || !empty($year) || !empty($month) ){
            
                $datedebut = !empty($currentMonth) ? date('Y-m-d',strtotime('first day of this month', time())) : $year."-".$month."-01";

                $datefin = !empty($currentMonth) ? date('Y-m-d') : date('Y-m-t',strtotime($year.'-'.$month.'-04'));
                if(date('Y-m')==$year."-".$month){
                    $datefin= date('Y-m-d');
                }
        }else{
            $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
            $datefin = date('Y-m-d');        
        }
        $conges = getNombreJourConge($userId,$currentMonth,$year,$month);
        $freeDays = getNombreHeurJourFerie($currentMonth,$year,$month,true,"2018-11-01")/8;
        return nombreJour($datedebut,$datefin)-$conges-$freeDays;
}

function getHolidaysByYears($year){
    $months = array('JAN','FEB','MAI','APR','MAR','JUN','JUL','AUG','SEP','OCT','NEV','DEC');
    $sql = "SELECT users.id as userId, MONTH( conges.date_debut ) as m , SUM( nbrJour ) AS total ".
                                " FROM conges, users".
                                " WHERE users.id = conges.id_personnels and YEAR( conges.date_debut )='".$year."'".
                                " GROUP BY id_personnels, MONTH( conges.date_debut )";
                        
    $res = doQuery($sql);
    $nb = mysql_num_rows($res);
    $tab = array();
    if ($nb == 0) {
        echo array();
    } else {
        $i = 0;
        while ($ligne = mysql_fetch_array($res)) {
            if ($i % 2 == 0)
                $c = "c";
            else
                $c = "";
            $tab[$ligne['userId'].'_'.$ligne['m']] = $ligne['total'];

        }
    }             
    return  $tab;    
}

function getSumHolidaysByYearPerUser($userId, $year) {
    $sql = "SELECT SUM(TO_DAYS( date_fin ) - TO_DAYS( date_debut )) AS tot  ".
                                " FROM conges".
                                " WHERE id_personnels =".$userId." and YEAR( conges.date_debut )=".$year;
                        
    $res = doQuery($sql);
    $nb = mysql_num_rows($res);
    while ($ligne = mysql_fetch_array($res)) {
        $res = $ligne['tot'];
    }
    return  $res;   
}

function getSumCreditByYearPerUser($userId, $year){
    $firstYear = explode("-", getValeurChamp('date_contrat', 'users', 'id', $userId))[0];
    $nbCongeThisYear = getSumHolidaysByYearPerUser($userId, $year);
    $nbCongeLastYear = getSumHolidaysByYearPerUser($userId, $year-1);
    if($year < $firstYear){
        return "-";
    } else if($year == $firstYear){
            return 18-$nbCongeThisYear;
    } else {
            return 36-($nbCongeThisYear + $nbCongeLastYear);
    }
}

function getHourFromMinutes($seconds){
    $h = intval($seconds / 3600);
    $sec = $seconds - $h*3600;
    $m = intval($sec / 60);
    $s =  $sec - $m * 60;
    return $h.":".($m<10?"0".$m:$m).":".($s<10?"0".$s:$s);
}


?>
