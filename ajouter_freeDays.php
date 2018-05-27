
<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des jours feries";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Jour feries";
$_SESSION['breadcrumb_nav3'] = "Nouveau jour ferie";

$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";

$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "freeDays.php";
$_SESSION['link_nav3'] = "ajouter_freeDays.php";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">

        <form action="gestion.php" name="frm" method="post" 
              onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="freeDays"/>
            <input type="hidden" name="page" value="freeDays.php"/>
               <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label"><?php echo "Cause" ?> : </label>
                            <div class="controls">
                                <input type="text" id="<?php echo "cause" ?>__required" 
                                       name="cause"  class="form-control input-small"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label"><?php echo "Nombre de jours" ?> : </label>
                            <div class="controls">
                                <input type="number" id="<?php echo "nbrJour" ?>__required" 
                                       name="nbrJour"  class="form-control input-small"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Date debut : </label>
                            <div class="controls">
                                <input type="date" id="cal__required" 
                                       name="dateDebut"  class="form-control input-small"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Date fin : </label>
                            <div class="controls">
                                <input type="date" id="cal2__required" 
                                       name="dateFin"  class="form-control input-small"/>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="<?php echo _AJOUTER ?>" /> ou <a class="text-danger" href="personnels.php">Annuler</a>
                        </div>
           
                    </div>
                </div>
            </div>
            </form>	
    </div>

</div>
</div>
</div>
</div>
</div>	


<?php require_once('foot.php'); ?>