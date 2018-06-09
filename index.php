<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Tableau de bord";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "";
$_SESSION['link_nav3'] = "";
$_SESSION['link_nav4'] = "";
$_SESSION['breadcrumb_nav4'] = "";
?>
<?php require_once('menu.php'); ?>     
<!-- /. NAV SIDE  -->
<div id="page-inner"> 
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="pointages.php">Pointages</a></h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" >                              
                        <a href="pointages.php"> <img src="images/pointage.png"  alt="Pointages" title="Pointages"/></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="conges.php">Conges</a></h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="82" >
                        <a href="conges.php"><img src="images/conge.jpg"  alt="Conges" title="Conges" style="border-radius: 7px;"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="pointagesMensuelle.php">Report</a></h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="84" >                                
                        <a href="pointagesMensuelle.php"><img src="images/report.png" alt="Report" title="Report" /></a>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <?php 
        if($_SESSION['role']==1){
    ?>
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="personnels.php">Personnels</a></h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="82" >
                        <a href="personnels.php"><img src="images/client-icone-9349-64.png"  alt="personnels" title="personnels"/></a>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="database.php">Base de donn&eacute;es</a></h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" >                              
                        <a href="database.php"> <img src="images/db.png"  alt="archiver  database" title="archiver database"/></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="papier_administratifs.php">Papier administratif</a></h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="46" >                             
                        <a href="papier_administratifs.php"> <img src="images/documents.png" alt="papier_administratifs" title="papier_administratifs"/> </a>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="postes.php">Roles</a></h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="82" >
                        <a href="postes.php"><img src="images/admin-user.png"  alt="Postes" title="Postes"/></a>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="freeDays.php">Jours feries</a></h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" >                              
                        <a href="freeDays.php"> <img src="images/jours-fériés.jpg"  alt="freeDays" title="Jours feries"/></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4><a href="ajouter_ventes.php">Deconnexion</a></h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="46" >                             
                        <a href="deconnexion.php"> <img src="images/deconnexion.png" alt="Deconnexion" title="Deconnexion"/> </a>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <?php } ?>
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                    TODO : 
                    <ul>
                        <li>Gestion des documents</li>
                        <ul>
                            <li>Attestation de travail</li>
                            <li>Attestation pôle emploi</li>
                            <li>Bulletin de paie</li>
                            <li>Accusé de réception de lettre de démission</li>
                            <li>Attestation de stage</li>
                            <li>Attestation salaire</li>
                        </ul>
                    </ul>             
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                    Fill DATA BASE : Pointages 
                    <ol>
                        <li>Achraf <b>Done</b></li>
                        <li>Noura<b>En cours</b></li>
                        <li>Bihi</li>
                        <li>Hamza</li>
                        <li>Saad</li>
                        <li>Simo</li>
                        <li>Abdelah<b>Done</b></li>
                    </ol>
                    Free days
                    </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                    Fill DATA BASE : Conge 
                    <ol>
                        <li>Achraf <b>Done</b></li>
                        <li>Noura<b>En cours</b></li>
                        <li>Bihi</li>
                        <li>Hamza</li>
                        <li>Saad</li>
                        <li>Simo</li>
                        <li>Abdelah<b>Done</b></li>
                    </ol>
                    </div>
        </div>
</div>

<?php require_once('foot.php'); ?>