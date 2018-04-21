<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion Pointages Mensuelle";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Pointages Mensuelle";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "pointagesMensuelle.php";
$_SESSION['link_nav3'] = "";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
?>
<?php require_once('menu.php'); ?>

<div id="page-inner"> 
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_REQUEST['m'])) { ?>
                <div class="alert alert-info">
                    <?php echo $_REQUEST['m'] ?>
                    <a href="#" data-dismiss="alert" class="close">x</a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                       	<form name="frm1" action="" method="post" >
                            <div class="col-lg-3">	
                                <div class="form-group">
                                    <label class="control-label">Mois:</label>
                                    <div class="controls">
                                        <select name="mois" class="form-control input-small-recherche" >
                                            <option></option>
                                            <?php for ($i=1; $i <= 12; $i++) {
                             $selected = isset($_REQUEST['mois']) && !empty($_REQUEST['mois']) && ($_REQUEST['mois']==$i || $_REQUEST['mois']=="0".$i) ? "selected=selected" : "";

                                                ?> 
                                            <option value="<?php echo $i<10?"0".$i:$i; ?>" <?php echo $selected ?>><?php echo $i<10?"0".$i:$i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">  
                                <div class="form-group">
                                    <label class="control-label">Ann&eacute;e:</label>
                                    <div class="controls">
                                        <select name="annee" class="form-control input-small-recherche" >
                                            <option></option>
                                            <?php for ($i=2018; $i <= 2030; $i++) {
                                         $selected2 = isset($_REQUEST['annee']) && !empty($_REQUEST['annee']) && ($_REQUEST['annee']==$i || $_REQUEST['annee']=="0".$i) ? "selected=selected" : "";
                                            ?> 
                                            <option value="<?php echo $i ?>" " <?php echo $selected2 ?>><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           <div class="col-lg-3">  
                                <div class="form-group">
                                    <label class="control-label"></label>
                                        <?php $value=isset($_REQUEST['moisCourant']) ? "checked":"" ?>
                                        <input type="checkbox" name="moisCourant" <?php echo $value ?>  value="1" onchange="document.frm1.submit()"> Mois Courant
                                    </label>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE . "r" ?>" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>						
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php
                        $where1 = "";
                        $dateToShow ="";
                        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
                        $datefin = date('Y-m-d',strtotime('last day of this month', time()));
                        if (isset($_POST['txtrechercher']) && !empty($_REQUEST['txtrechercher']))
                            $where1 .= " and id_personnels in (select ID from users where  nom like '%" . $_POST['txtrechercher'] . "%' or login like '%" . $_POST['txtrechercher'] . "%') ";

                        if (isset($_POST['mois']) && !empty($_REQUEST['mois']) && isset($_POST['annee']) && !empty($_REQUEST['annee']))
                        {
                            $dateToShow = $_POST['mois']."-".$_POST['annee'];
                            $where1 .= " and date_pointage like '" . $_POST['annee']."-".$_POST['mois']."%'";
                        }

                        if ((isset($_POST['moisCourant']) && !empty($_REQUEST['moisCourant']) ) || empty($where1)){
                            $dateToShow = date("m-Y");
                            $where1 .= " and date_pointage between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')";
                        }
                        $sql = "select u.id as userId,u.nom ,p.id_personnels,p.sumTime from users u left join (SELECT id_personnels, SEC_TO_TIME( SUM( TIME_TO_SEC( m_end ) - TIME_TO_SEC( m_start ) + TIME_TO_SEC( s_end ) - TIME_TO_SEC( s_start ) ) ) AS sumTime FROM pointages   WHERE 1=1 " . $where1 . " GROUP BY id_personnels) as p on u.id = p.id_personnels";
                        
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else {
                            ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Heurs travailler</th>
                                    <th>Conges / Retard</th>
                                    <th>Rapport mensuelle</th>
                                    <th>Somme des Rapport</th>
                                </thead>	
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($ligne = mysql_fetch_array($res)) {

                                        if ($i % 2 == 0)
                                            $c = "c";
                                        else
                                            $c = "";
                                        $moisCourant = isset($_REQUEST['moisCourant']) && !empty($_REQUEST['moisCourant']) ? $_REQUEST['moisCourant'] : "";
                                        $annee = isset($_REQUEST['annee']) && !empty($_REQUEST['annee']) ? $_REQUEST['annee'] : "";
                                        $mois = isset($_REQUEST['mois']) && !empty($_REQUEST['mois']) ? $_REQUEST['mois'] : "";
                                        $nbrConge = getNombreJourConge($ligne['userId'],$moisCourant,$annee,$mois);
                                        $rapportMensuelle = getRapportMoisActuelle($ligne['userId'],$moisCourant,$annee,$mois,$ligne['sumTime']);
                                        $rapport = getRapport($ligne['userId']);
                                        $styleTd1="";
                                        $styleTd2="";
                                        $pos1 = strpos($rapportMensuelle, "-")>-1?true:false;
                                        $pos2 = strpos($rapport, "-")>-1?true:false;                                        
                                        if($pos1){
                                            $styleTd1 = "background: red;color: white;font-weight: bold;";
                                        } else {
                                            if($rapportMensuelle!=0) {
                                                $styleTd1 = "background: green;color: white;font-weight: bold;";
                                            }
                                        }
                                        if($pos2){
                                            $styleTd2 = "background: red;color: white;font-weight: bold;";
                                        }
                                        ?>
                                        <tr class="<?php echo $c ?>">
                                            <td><?php echo getValeurChamp('nom', 'users', 'id', $ligne['userId'])  ?></td>
                                            <td><?php echo $dateToShow;  ?></td>
                                            <td><?php echo empty($ligne['sumTime']) ? "0" : $ligne['sumTime']  ?></td>
                                            <td><?php echo $nbrConge;  ?></td>
                                            <td style="<?php echo $styleTd1; ?>"><?php echo $rapportMensuelle; ?></td>
                                            <td style="<?php echo $styleTd2; ?>"><?php echo $rapport; ?></td>
                                            

                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br/>
                            <?php
                        } //Fin If
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require_once('foot.php'); ?>