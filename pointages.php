<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion Pointages";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Pointages";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "pointages.php";
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
                                    <label class="control-label">Salarie:</label>
                                    <div class="controls">
                                        <input type="text" name="txtrechercher" value="<?php if (isset($_POST['txtrechercher'])) echo $_POST['txtrechercher']; ?>" class="form-control input-small-recherche" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE . "r" ?>" />
                                </div>
    
                            </div>
                            <div class="col-lg-3">	
                                <div class="form-group">
                                    <label class="control-label">Date Pointage entre:</label>
                                    <div class="controls">
                                        <input type="date" id="cal_required" name="dateDebut"  value="<?php if (isset($_POST['dateDebut'])) echo $_POST['dateDebut']; ?>" class="form-control input-small" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">	
                                <div class="form-group">
                                    <label class="control-label">Et :</label>
                                    <div class="controls">
                                        <input type="date" id="cal_required" name="dateFin"  value="<?php if (isset($_POST['dateFin'])) echo $_POST['dateFin']; ?>"   class="form-control input-small" />
                                    </div>
                                </div>

                               </div>
                               <div class="col-lg-3">  
                                    <div class="form-group">
                                        <label class="control-label"></label>
                                            <?php $value=isset($_REQUEST['moisCourant']) ? "checked":"" ?>
                                            <input type="checkbox" name="moisCourant" <?php echo $value ?>  onchange="document.frm1.submit()"> Mois Courant
                                        </label>
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
                        $datedebut = date('Y-m-d',strtotime('first day of this month', time()));
                        $datefin = date('Y-m-d',strtotime('last day of this month', time()));
                        
                        if (isset($_POST['txtrechercher']) && !empty($_REQUEST['txtrechercher']))
                            $where1 .= " and id_personnels in (select ID from users where  nom like '%" . $_POST['txtrechercher'] . "%' or login like '%" . $_POST['txtrechercher'] . "%') ";

                        if (isset($_POST['dateDebut']) && !empty($_REQUEST['dateDebut']))
                            $where1 .= " and date_pointage >= DATE_FORMAT('" . $_POST['dateDebut'] . "', '%Y-%m-%d')";

                        if (isset($_POST['dateFin']) && !empty($_REQUEST['dateFin']))
                            $where1 .= " and date_pointage <= DATE_FORMAT('" . $_POST['dateFin'] . "', '%Y-%m-%d')";

                        if (isset($_POST['moisCourant']) && !empty($_REQUEST['moisCourant']))
                        {
                            $where1 .= " and date_pointage between DATE_FORMAT('" . $datedebut . "', '%Y-%m-%d') and DATE_FORMAT('" . $datefin. "', '%Y-%m-%d')";
                        }    

                        $sql = "select id,id_personnels,date_pointage,m_start,m_end,s_start,s_end,ADDTIME(TIMEDIFF(m_end, m_start),TIMEDIFF(s_end, s_start )) as d from pointages where 1=1 " . $where1 . " order by id desc";
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
                        if ($nb == 0) {
                            echo _VIDE;
                        } else {
                            ?>
                            <table class="table table-striped table-bordered table-hover" >
                                <tr>
                                    <th>Date Debut</th>
                                    <th>Date Fin</th>
                                    <th style="width:300px">Somme des heurs</th>
                                </tr>
                                <tr>
                                    <td><?php echo isset($_POST['dateDebut']) && !empty($_REQUEST['dateDebut']) && $_POST['dateDebut'] != 1 ? $_REQUEST['dateDebut'] : "Non d&eacute;fini" ?></td>
                                    <td><?php echo isset($_POST['dateFin']) && !empty($_REQUEST['dateFin']) && $_POST['dateFin'] != 1 ? $_REQUEST['dateFin'] : "Non d&eacute;fini" ?></td>
                                    <td><?php echo getSommeNombreHeurN($where1) ?></td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Entr&eacute; 1</th>
                                <th>Sortie 1</th>
                                <th>Entr&eacute; 2</th>
                                <th>Sortie 2</th>
                                <th>Somme</th>
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
                                            <td><?php echo $ligne['date_pointage'] ?></td>
                                            <td><?php echo $ligne['m_start'] ?></td>
                                            <td><?php echo $ligne['m_end'] ?></td>
                                            <td><?php echo $ligne['s_start'] ?></td>
                                            <td><?php echo $ligne['s_end'] ?></td>
                                            <td><?php echo $ligne['d'] ?></td>
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