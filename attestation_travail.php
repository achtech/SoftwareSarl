<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Attestation de travail";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Documents administratif";
$_SESSION['breadcrumb_nav3'] = "Attestation de travail";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "documents.php";
$_SESSION['link_nav3'] = "attestation_travail.php";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
?>
<?php require_once('menu.php'); ?>     
<div id="page-inner"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12"> 
                            <form action="" name="frm" method="post" >
                                
                                <div class="form-group">
                                    <label class="control-label">Salarie : </label>
                                    <?php 
                                        $whereUser = "";
                                        if($_SESSION['role']!=1){
                                            $whereUser = " where id=".$_SESSION['user'];   
                                        }
                                        $value = isset($_REQUEST['id_personnels']) && !empty($_REQUEST['id_personnels']) ? $_REQUEST['id_personnels'] : 0;
                                        $change = "onchange='this.form.submit()'";
                                echo getTableList('users', 'id_personnels', $value, 'nom', $change, $whereUser, "");
                                        $nom =  isset($_REQUEST['id_personnels']) && !empty($_REQUEST['id_personnels']) ? getValeurChamp('nom','users','id',$_REQUEST['id_personnels']) : "not selected";


$cin =  isset($_REQUEST['id_personnels']) && !empty($_REQUEST['id_personnels']) ? getValeurChamp('cin','users','id',$_REQUEST['id_personnels']) : "not selected";

$qualite =  isset($_REQUEST['id_personnels']) && !empty($_REQUEST['id_personnels']) ? getValeurChamp('qualite','users','id',$_REQUEST['id_personnels']) : "not selected";

$dateEmbauche =  isset($_REQUEST['id_personnels']) && !empty($_REQUEST['id_personnels']) ? getValeurChamp('date_contrat','users','id',$_REQUEST['id_personnels']) : "not selected";

                                    ?>
                                </div>
                       </form>
                                <div style="border: 1px solid gray;fonct-size : 40px !important;padding: 10px;">
<div style="float:left">

             <form action="gestion.php" name="frm" method="post" 
                                  onsubmit="return checkForm(document.frm);" >
                                <input type="hidden" name="act" value="generer_attestation_de_travail"/>
                                <input type="hidden" name="page" value="conges.php"/>
               
    <img src="images/Logo.jpg"></div>

<div style="float:right;font-size:20px">
App 6 2eme étage  M'HITA <br>espace AL moustapha Semlalia,<br>40000 Marrakech Maroc<br>
Tel : +212 524 449 352<br>
N° RC 58467  <br>
N° de Patente 92110189<br>  
N° Id.fisc 0652837 <br>
</div>
<br style="clear:both">
<p style="font-size: 34px;
    font-weight: bolder;
    text-align: -webkit-center;margin-top:100px">
Attestation de travail
 </p>
<p  style="font-size: 22px;"> 
    Madame, Monsieur,
</p>
<p  style="font-size: 22px;"> 
Nous certifions que Monsieur / Madame <b><?php echo $nom ?></b> titulaire de la CIN N° <b><?php echo $cin ?></b> est employé par la société SOFTWARE S.A.R.L dont le siège social est situé à app 6 2eme étage  M'HITA espace AL moustapha Semlalia,40000 Marrakech, en tant que <b><?php echo $qualite ?></b> en contrat à durée indéterminée depuis le <b><?php echo $dateEmbauche ?></b>. jusqu'à ce jour. 
</p>
<p  style="font-size: 22px;"> 
La présente attestation est délivrée à l’intéressé sur sa demande pour servir et valoir ce que de droit.<br>
</p>
<p  style="font-size: 22px;"> 
Nous vous prions de croire, Madame, Monsieur, à l’expression de nos salutations distinguées.<br>
 </p>

</p>
<p  style="font-size: 22px;"> 
Fait à Marrakech <br>
le <?php echo date("d-m-Y") ?>,
</p>
                                </div>
                                </div>
                            <div class="col-lg-12">
                                <div class="form-actions">
                                    <input type="submit" name="v" class="btn btn-primary" value="<?php echo _IMPRIMER ?>" />
                                </div>
                            </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php require_once('foot.php'); ?>