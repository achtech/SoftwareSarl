
<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion des pointages";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Pointages";
$_SESSION['breadcrumb_nav3'] = "Modifier un pointage";

$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "pointages.php";
$_SESSION['link_nav3'] = "modifier_pointage.php?pointages=" . $_REQUEST['pointages'];
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">
        <form action="gestion.php" name="frm" method="post" 
            onsubmit="return checkForm(document.frm);" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                        <input type="hidden" name="act" value="m"/>
                        <input type="hidden" name="table" value="pointages"/>
                        <input type="hidden" name="page" value="pointages.php"/>

                        <input type="hidden" name="id_nom" value="id"/>
                        <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['pointages'] ?>"/>	

                        <input type="hidden" name="id_noms_retour" value="pointages"/>
                        <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['pointages'] ?>"/>	


                        <div class="form-group">
                            <label class="control-label"><?php echo "Nom" ?> : </label>
                            <div class="controls">
                                <?php echo getValeurChamp('nom', 'users', 'id', getValeurChamp('id_personnels', 'pointages', 'id', $_REQUEST['pointages'])) ?> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo "Date pointage" ?> : </label>
                            <div class="controls">
                                <input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('date_pointage', 'pointages', 'id', $_REQUEST['pointages']); ?>"  name="date_pointage"  />

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo "Heur d'entr&eacute;e" ?> : </label>
                            <div class="controls">
                                <input type="time" id="<?php echo "timeIn" ?>_required"  value="<?php echo getValeurChamp('timeIn', 'pointages', 'id', $_REQUEST['pointages']); ?>"
                                       name="timeIn"  class="form-control input-small"/>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label"><?php echo "Heur de sortie" ?> : </label>
                            <div class="controls">
                                <input type="time" id="<?php echo "timeOut" ?>_required"  value="<?php echo getValeurChamp('timeOut', 'pointages', 'id', $_REQUEST['pointages']); ?>"
                                       name="timeOut"  class="form-control input-small" />
                            </div>
                        </div>
                            </div>
                        </div>
        </div>
                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="pointages.php">Annuler</a>
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