

<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des personnels";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Personnels";
$_SESSION['breadcrumb_nav3'] = "Mise à personnel";


$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "personnels.php";
$_SESSION['link_nav3'] = "modifier_personnel.php";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">
        <form action="gestion.php" name="frm" method="post" 
              onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="users"/>
            <input type="hidden" name="page" value="personnels.php"/>

            <input type="hidden" name="id_nom" value="id"/>
            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['users'] ?>"/>	

            <input type="hidden" name="id_noms_retour" value="users"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['users'] ?>"/>	
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">	
                        <div class="form-group">
                            <label class="control-label"><?php echo "nom" ?> : </label>
                            <input type="text" id="<?php echo "nom" ?>__required" value="<?php echo getValeurChamp('nom', 'users', 'id', $_REQUEST['users']); ?>"
                                   name="nom"  class="form-control input-small"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo "Login" ?> : </label>
                            <input type="text" id="<?php echo "login" ?>_required"  value="<?php echo getValeurChamp('login', 'users', 'id', $_REQUEST['users']); ?>"
                                   name="login"  class="form-control input-small"/>
                        </div>						

                        <div class="form-group">
                            <label class="control-label">Date d'embauche : </label>
                            <div class="controls">
                                <input type="date" id="cal__required" value="<?php echo getValeurChamp('date_contrat', 'users', 'id', $_REQUEST['users']); ?>"
                                       name="date_contrat"  class="form-control input-small"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo "Type" ?> : </label>
                            <?php
                            $v = getValeurChamp('role', 'users', 'id', $_REQUEST['users']);
                            $isSalarie = $v == 1 ? "selected='selected'" : "";
                            $isOuvrier = $v == 2 ? "selected='selected'" : "";
                            ?>
                            <select name = "role" id="role_required" class="form-control">  
                                <option value="">- -  - - _</option>
                                <option <?php echo $isSalarie; ?> value="1">Admin</option>
                                <option <?php echo $isOuvrier; ?>  value="2">User</option>
                            </select> 
                        </div>
                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="personnels.php">Annuler</a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>						
<?php require_once('foot.php'); ?>