
<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des conges";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "conges.php";
$_SESSION['link_nav3'] = "modifier_conge.php";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Conges";
$_SESSION['breadcrumb_nav3'] = "mise a jour du conge";
?>
<?php require_once('menu.php'); ?>

<div id="page-inner"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">	
                            <form action="gestion.php" name="frm" method="post" 
                                  onsubmit="return checkForm(document.frm);" >
                                <input type="hidden" name="act" value="m"/>
                                <input type="hidden" name="table" value="conges"/>
                                <input type="hidden" name="page" value="conges.php"/>
                                
                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['conges'] ?>"/>  

                                <input type="hidden" name="id_noms_retour" value="conges"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['conges'] ?>"/>  


                                <div class="form-group">
                                    <label class="control-label">Salarie : </label>
                                    <?php echo getTableList('users', 'id_personnels', getValeurChamp('id_personnels','conges','id',$_REQUEST['conges']), 'nom', "", "", "") ?>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label"><?php echo "Libelle :" ?>  </label>
                                    <div class="controls">
                                        <input type="text" id="<?php echo "Libelle" ?>__required" value="<?php echo getValeurChamp('Libelle','conges','id',$_REQUEST['conges']) ?>" 
                                               name="Libelle"  class="form-control input-small"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><?php echo "Date debut" ?> : </label>
                                    <input type="date" id="cal__required" value="<?php echo getValeurChamp('date_debut','conges','id',$_REQUEST['conges']) ?>" 
                                           name="date_debut"  class="form-control"/>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label"><?php echo "Date fin" ?> : </label>
                                    <input type="date" id="cal2__required" value="<?php echo getValeurChamp('date_fin','conges','id',$_REQUEST['conges']) ?>"
                                           name="date_fin"  class="form-control"/>
                                </div>
                                  <div class="form-group">
                                    <label class="control-label"><?php echo "Nombre de jour :" ?>  </label>
                                    <div class="controls">
                                        <input type="text" id="<?php echo "nbrJour" ?>__required" value="<?php echo getValeurChamp('nbrJour','conges','id',$_REQUEST['conges']) ?>" 
                                               name="nbrJour"  class="form-control input-small"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">
                                        <?php echo _MODIFIER ?>
                                    </button>
                                    ou <a class="text-danger" href="conges.php">Annuler</a>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php require_once('foot.php'); ?>