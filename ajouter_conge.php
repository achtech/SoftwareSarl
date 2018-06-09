
<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des conges";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "conges.php";
$_SESSION['link_nav3'] = "ajouter_conge.php";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Conges";
$_SESSION['breadcrumb_nav3'] = "Nouveau conge";
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
                                <input type="hidden" name="act" value="a"/>
                                <input type="hidden" name="table" value="conges"/>
                                <input type="hidden" name="page" value="conges.php"/>
                                
                                <div class="form-group">
                                    <label class="control-label">Salarie : </label>
                                    <?php 
                                        $whereUser = "";
                                        if($_SESSION['role']!=1){
                                            $whereUser = " where id=".$_SESSION['user'];   
                                        }
                                        echo getTableList('users', 'id_personnels', "", 'nom', "", $whereUser, "");
                                    ?>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label"><?php echo "Libelle :" ?>  </label>
                                    <div class="controls">
                                        <input type="text" id="<?php echo "Libelle" ?>__required" 
                                               name="Libelle"  class="form-control input-small"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><?php echo "Date debut" ?> : </label>
                                    <input type="date" id="cal__required" 
                                           name="date_debut"  class="form-control"/>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label"><?php echo "Date fin" ?> : </label>
                                    <input type="date" id="cal2__required" 
                                           name="date_fin"  class="form-control"/>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label"><?php echo "Nombre de jour :" ?>  </label>
                                    <div class="controls">
                                        <input type="text" id="<?php echo "nbrJour" ?>__required" 
                                               name="nbrJour"  class="form-control input-small"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">
                                        <?php echo _AJOUTER ?>
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