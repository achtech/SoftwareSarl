<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Documents administratif";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Documents administratif";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "documents.php";
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
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" style="font-size: 60px;width: auto;height: 160px">                              
                        <a href="pointages.php">Attestation<br> de travail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" style="font-size: 60px;width: auto;height: 160px">                              
                        <a href="pointages.php">Attestation<br> pôle emploi </a>
                    </div>                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" style="font-size: 60px;width: auto;height: 160px">                              
                        <a href="pointages.php">Bulletin <br>de paie</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="easypiechart" id="easypiechart-orange" data-percent="45" style="font-size: 45px;width: auto;height: 160px">                              
                        <a href="pointages.php">Accusé de réception<br> de lettre de démission</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" style="font-size: 60px;width: auto;height: 160px">                              
                        <a href="pointages.php">Attestation <br> de stage</a>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55" style="font-size: 60px;width: auto;height: 160px">                              
                        <a href="pointages.php">Attestation salaire</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    </div><!--/.row-->

<?php require_once('foot.php'); ?>