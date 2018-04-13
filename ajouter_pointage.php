<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Pointage des personnels";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Pointage";
$_SESSION['breadcrumb_nav3'] = "Ajout des pointages";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";

$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "pointages.php";
$_SESSION['link_nav3'] = "ajouter_pointage.php";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">
        <div class="col-12">
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
                            <div class="col-lg-12">	
                                <div class="form-group">
                                    <?php $date = isset($_REQUEST['date_pointage']) && !empty($_REQUEST['date_pointage']) ? $_REQUEST['date_pointage'] : date('Y-m-d'); ?>
                                    <label class="control-label">Date pointage <input type="date"  onchange="this.form.submit()"
                                                                                      name="date_pointage"  class="form-control input-small" value="<?php echo $date ?>" /></label>
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

                    <div class="widget-content nopadding">
                        <?php


                        $sql = "select * from users order by id";
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else {
                            ?>
                            <form action="gestion.php" name="frm" method="post" 
                                  onsubmit="return checkForm(document.frm);" >
                                <input type="hidden" name="act" value="ajouter_pointage"/>
                                <input type="hidden" name="table" value="pointages"/>
                                <input type="hidden" name="page" value="pointages.php"/>
                                <input type="hidden" name="date_pointage" value="<?php echo $date ?>"/>
                                <input type="hidden" name="nb_personnage" value="<?php echo $nb ?>"/>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr> 
                                    <th rowspan="2">Nom</th>
                                    <th colspan="2">Matin</th>
                                    <th colspan="2">Apres midi</th>
                                    
                                    </tr>
                                    <tr>
                                    <th>H.EN</th>
                                    <th>H.SOR</th>
                                    <th>H.EN</th>
                                    <th>H.SOR</th>
                                    </tr>
                                    </thead>    
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $nb = mysql_num_rows($res);
                                        while ($ligne = mysql_fetch_array($res)) {

                                            if ($i % 2 == 0)
                                                $c = "c";
                                            else
                                                $c = "";
                                            ?>
                                            <tr class="<?php echo $c ?>">
<input type="hidden" name="id_<?php echo $i ?>" value="<?php echo $ligne['id'] ?>"/>
<td><?php echo $ligne['nom'] ?></td>
<td><input type="time" id="<?php echo "m_start" ?>" name="m_start_<?php echo $i ?>"  class="form-control input-small" style="width: 100px"/></td>
<td><input type="time" id="<?php echo "m_end" ?>" name="m_end_<?php echo $i ?>"      class="form-control input-small" style="width: 100px" /></td>
<td><input type="time" id="<?php echo "s_start" ?>" name="s_start_<?php echo $i ?>"  class="form-control input-small" style="width: 100px" /></td>
<td><input type="time" id="<?php echo "s_end" ?>" name="s_end_<?php echo $i ?>"      class="form-control input-small" style="width: 100px" /></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            } //Fin If
                            ?>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary" value="<?php echo _VALIDER ?>" /> ou <a class="text-danger" href="personnels.php">Annuler</a>
                            </div>
                        </form>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        <?php require_once('foot.php'); ?>