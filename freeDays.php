<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion Des Jours feries";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "FreeDays";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['breadcrumb_nav4'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "freeDays.php";
$_SESSION['link_nav3'] = "";
$_SESSION['link_nav4'] = "";
?>
<?php require_once('menu.php'); ?>
<div id="page-inner"> 
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php
                        $sql = "select * from freeDays order by id";
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else {
                            ?>
                            <br/>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <th>Cause</th>
                                <th>Nombre de jours</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th class="op"> <?php echo _OP ?> </th>
                                </thead>	
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($ligne = mysql_fetch_array($res)) {

                                        if ($i % 2 == 0)
                                            $c = "c";
                                        else
                                            $c = "";
                                        ?>
                                        <tr class="<?php echo $c ?>">
                                            <td><?php echo $ligne['cause'] ?></td>
                                            <td><?php echo $ligne['nbrJour'] ?></td>
                                            <td><?php echo $ligne['dateDebut'] ?></td>
                                            <td><?php echo $ligne['dateFin'] ?></td>
                                            <td class="op">
                                                <a href="modifier_freeDays.php?freeDays=<?php echo $ligne['id'] ?>" class="modifier2" title="<?php echo _MODIFIER ?>">
                                                    <i class="glyphicon glyphicon-edit"></i> 
                                                </a>
                                                &nbsp;
                                                <a href="#ancre" 
                                                   class="supprimer2" 
                                                   onclick="javascript:supprimer(
                                                                           'freeDays',
                                                                           '<?php echo $ligne['id'] ?>',
                                                                           'freeDays.php',
                                                                           '1',
                                                                           '1')
                                                   " 
                                                   title="<?php echo _SUPPRIMER ?>">

                                                    <i class="glyphicon glyphicon-remove"></i> 
                                                </a>
                                            </td>
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
                    </div>
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->			 
<?php require_once('foot.php'); ?>