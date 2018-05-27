
<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des personnels";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Personnels";
$_SESSION['breadcrumb_nav3'] = "Nouveau personnel";

$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";

$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "personnels.php";
$_SESSION['link_nav3'] = "ajouter_personnel.php";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">

        <form action="gestion.php" name="frm" method="post" 
              onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="users"/>
            <input type="hidden" name="page" value="personnels.php"/>
            <input type="hidden" name="password" value="software"/>
               <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label"><?php echo "Nom" ?> : </label>
                            <div class="controls">
                                <input type="text" id="<?php echo "nom" ?>__required" 
                                       name="nom"  class="form-control input-small"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo "Login" ?> : </label>
                            <div class="controls">
                                <input type="text" id="<?php echo "login" ?>__required" 
                                       name="login"  class="form-control input-small"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo "Type" ?> : </label>
                            <div class="controls">
                                <select name = "role" id="TYPE_required" class="form-control" > 

                                    <option value="">- -  - - - -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>

                                </select>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label">Date d'embauche : </label>
                            <div class="controls">
                                <input type="date" id="cal__required" 
                                       name="date_contrat"  class="form-control input-small"/>
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