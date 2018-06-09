<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Rapport des conges";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Conges Mensuelle";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "congesMensuelle.php";
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
                                    <label class="control-label">Ann&eacute;e:</label>
                                    <div class="controls">
                                        <select name="annee" class="form-control input-small-recherche" >
                                            <option></option>
                                            <?php for ($i=2013; $i <= 2030; $i++) {
                                            $selected2 = isset($_REQUEST['annee']) && !empty($_REQUEST['annee']) && ($_REQUEST['annee']==$i || $_REQUEST['annee']=="0".$i) ? "selected=selected" : "";
                                            ?> 
                                            <option value="<?php echo $i ?>" " <?php echo $selected2 ?>><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
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
                        $whereUser = "";
                        if($_SESSION['role']!=1){
                            $whereUser = " where u.id=".$_SESSION['user'];   
                        }

                        $sql = "select * from users u ".$whereUser;
                        $res = doQuery($sql);
                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else { 
                        ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>Nom</th>
                                    <?php for($year=2014;$year<=date('Y');$year++) {?>
                                        <th colspan="2"><?php echo $year ?></th>
                                    <?php } ?>
                                </thead>
                                <thead>
                                    <th></th>
                                    <?php for($year=2014;$year<=date('Y');$year++) {?>
                                        <th>Somme</th>
                                        <th>Reste</th>
                                    <?php } ?>
                                </thead>	
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($ligne = mysql_fetch_array($res)) {
                                        if ($i % 2 == 0)
                                            $c = "c";
                                        else
                                            $c = "";
                                        echo "<tr class=".$c.">";
                                        echo "<td>".$ligne['nom']."</td>"; 
                                        for($year=2014;$year<=date('Y');$year++) {
                                                echo "<td style='text-align: center' >".getSumHolidaysByYearPerUser($ligne['id'], $year)."</td>";
                                                echo "<td style='text-align: center' >".getSumCreditByYearPerUser($ligne['id'], $year)."</td>";
                                        } 
                                        echo "</tr>";
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
        </div>
    </div>
</div>
</div>
<?php require_once('foot.php'); ?>