<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion Pointages Mensuelle";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Pointages Mensuelle";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "pointagesMensuelle.php";
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
                                    <label class="control-label">Mois:</label>
                                    <div class="controls">
                                        <select name="mois" class="form-control input-small-recherche" >
                                            <option></option>
                                            <?php for ($i=1; $i <= 12; $i++) {?> 
                                            <option value="<?php echo $i<10?"0".$i:$i; ?>"><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">  
                                <div class="form-group">
                                    <label class="control-label">Ann&eacute;e:</label>
                                    <div class="controls">
                                        <select name="annee" class="form-control input-small-recherche" >
                                            <option></option>
                                            <?php for ($i=2018; $i <= 2030; $i++) {?> 
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           <div class="col-lg-3">  
                                <div class="form-group">
                                    <label class="control-label"></label>
                                        <?php $value=isset($_REQUEST['moisCourant']) ? "checked":"" ?>
                                        <input type="checkbox" name="moisCourant" <?php echo $value ?>  value="1" onchange="document.frm1.submit()"> Mois Courant
                                    </label>
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
                        $where1 = "";
                        $dateToShow ="";
                        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
                        $datefin = date('Y-m-d',strtotime('last day of this month', time()));
                        if (isset($_POST['txtrechercher']) && !empty($_REQUEST['txtrechercher']))
                            $where1 .= " and id_personnels in (select ID from users where  nom like '%" . $_POST['txtrechercher'] . "%' or login like '%" . $_POST['txtrechercher'] . "%') ";

                        if (isset($_POST['mois']) && !empty($_REQUEST['mois']) && isset($_POST['annee']) && !empty($_REQUEST['annee']))
                            $where1 .= " and date_pointage like '" . $_POST['annee']."-".$_POST['mois']."%'";


                        if ((isset($_POST['moisCourant']) && !empty($_REQUEST['moisCourant']) ) || empty($where1)){
                            $dateToShow = date("M-Y");
                            $where1 .= " and date_pointage between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')";
                        }
                        echo $sql = "SELECT id_personnels, SEC_TO_TIME( SUM( TIME_TO_SEC( m_end ) - TIME_TO_SEC( m_start ) + TIME_TO_SEC( s_end ) - TIME_TO_SEC( s_start ) ) ) AS sumTime
                        FROM pointages
                        WHERE 1=1 " . $where1 . " 
                        GROUP BY id_personnels
                        LIMIT 0 , 30";
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else {
                            ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Heurs travailler</th>
                                    <th>Rapport mois actuelle</th>
                                    <th>Somme des Rapport</th>
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
                                            <td><?php echo getValeurChamp('nom', 'users', 'ID', $ligne['id_personnels'])  ?></td>
                                            <td><?php echo $dateToShow;  ?></td>
                                            <td><?php echo $ligne['sumTime'] ?></td>
                                            <td><?php echo getRapportMoisActuelle($ligne['id_personnels'],$_REQUEST['moisCourant'],$_POST['annee'],$_POST['mois']) ?></td>
                                            <td><?php // echo ?></td>
                                            <td class="op">
                                                &nbsp;
                                                <a href="modifier_pointage.php?pointages=<?php echo $ligne['id'] ?>" class="modifier2" title="<?php echo _MODIFIER ?>">
                                                    <i class="glyphicon glyphicon-edit"></i> 
                                                </a>
                                                &nbsp;

                                                <a href="#ancre" 
                                                   class="supprimer2" 
                                                   onclick="javascript:supprimer(
                                                                           'pointages',
                                                                           '<?php echo $ligne['id'] ?>',
                                                                           'pointages.php',
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
                            <br/>
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