<?php require_once('head.php'); ?>
<?php
$_SESSION['titre'] = "Gestion Des Conges";
$_SESSION['breadcrumb_nav1'] = "Accueil";
$_SESSION['breadcrumb_nav2'] = "Conges";
$_SESSION['breadcrumb_nav3'] = "";
$_SESSION['link_nav1'] = "index.php";
$_SESSION['link_nav2'] = "Conges.php";
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
                    	<div style="padding:30px;text-align: justify; ">

<p>
Pour bien travailler, il faut se reposer. En effet, tout salarié, indépendamment de son âge et son secteur d’activité, a droit à des congés payés. La législation marocaine du travail est on ne peut plus claire sur ce point: «Tout salarié a droit, après six mois de service continu dans la même entreprise ou chez le même employeur, à un congé annuel payé dont la durée est fixée comme suit: un jour et demi de travail effectif par mois de service ou deux jours de travail effectif par mois de service pour les salariés âgés de moins de dix-huit ans».
</p>
<p>
Ainsi, il est possible de sortir en congé à n’importe quel moment de l’année, sauf restrictions préalables justifiées par l’employeur. Effectivement, selon les cas, ces dates sont, en général, fixées en fonction de la situation familiale du salarié (marié avec ou sans enfants) et son ancienneté. La priorité sera ainsi donnée à l’employé qui a des enfants et qui affiche un certain nombre d’années dans l’entreprise. Les nouvelles recrues devront s’adapter à ces conditions. Il arrive aussi que l’employeur décide de fixer les congés sur une période déterminée «pour des raisons de service». Il en a tout à fait le droit. Tout comme il peut fermer l’ensemble de l’entreprise et ainsi permettre à tous les employés de sortir en congé en même temps. Toujours est-il que dans tous les cas, «les dates de congé doivent être communiquées dans un délai minimum de 30 jours avant le départ», souligne Kacha Zine El Abidine, inspecteur du travail. Avant d'ajouter que  «ce planning doit être inscrit sur un répertoire disponible pour consultation par les employés et les autorités». De plus, après cinq années de service, le congé est augmenté d’un jour et demi de travail. D’autre part, l'article 235 du code du travail souligne que la durée du congé annuel payé est augmentée d'autant de jours qu'il y a de jours de fête payés et de jours fériés pendant la période du congé annuel.
</p>
<p>
Au-delà des congés «normaux», il existe des congés dits «spéciaux à l'occasion de certains événements et congés pour convenances personnelles». Souvent méconnus des salariés, ces congés  permettent de mener à bien un projet personnel ou de se consacrer à sa famille. Tout d’abord, le congé relatif à la naissance: l’article 269 stipule que «tout salarié a droit, à l'occasion de chaque naissance, à un congé de trois jours. Cette disposition s'applique en cas de reconnaissance par le salarié de la paternité d'un enfant. De plus, ces trois jours peuvent être continus ou discontinus, après entente entre l'employeur et le salarié, mais doivent être inclus dans la période d'un mois à compter de la date de naissance». Vient ensuite le congé maladie. Sous réserve de justification auprès de l’employeur dans les 48 heures,  le salarié peut ne pas se rendre à son travail. Mais «si l'absence se prolonge plus de quatre jours, le salarié doit faire connaître à l'employeur la durée probable de son absence et lui fournir, sauf en cas d'empêchement, un certificat médical justifiant son absence», explique l’inspecteur du travail.  «A ce moment-là, l'employeur peut faire procéder à une contre-visite du salarié par un médecin de son choix et à ses frais pendant la durée de l'absence fixée par le certificat médical produit par le salarié», ajoute-t-il.
</p>
<p>
Des congés sont également mis à la disposition dans des cas exceptionnels. Quatre jours sont accordés en cas de mariage du salarié et deux jours pour ses enfants. Lors d’un décès d’un conjoint/enfant/ou tout autre ascendant, ce sont 3 jours qui sont concédés. Si le décès concerne un frère ou sœur du salarié, ou encore un frère ou sœur du conjoint de celui-ci ou d'un ascendant du conjoint, deux jours de congé sont tolérés. Lors d’une circoncision, deux jours sont attribués, il en est de même pour une opération chirurgicale du conjoint ou d'un enfant à charge.
</p>
<p>
De plus, le code du travail donne le droit au salarié de bénéficier d'une permission d'absence pour passer un examen, effectuer un stage sportif national ou participer à une compétition internationale ou nationale officielle. Les employeurs sont également tenus d’accorder à leurs salariés, membres des conseils communaux, des permissions d'absence pour assister aux assemblées générales de ces conseils et aux réunions des commissions qui en relèvent s'ils en sont membres.
</p>
<p>
En cas de refus par l’employeur d’accorder des congés à son employé, la loi prévoit des sanctions. En effet, «sont punis d'une amende de 300 à 500 dirhams: le refus d'octroi du congé pour naissance et le défaut de paiement de l'indemnité. Le refus d'octroi des jours d'absence ou d'une durée inférieure à celle fixée par la loi et le défaut de paiement des absences sont également concernés», explique l’inspecteur. Cette amende est appliquée autant de fois qu'il y a de salariés à l'égard desquels il y a eu non-respect de la loi sans toutefois que le total des amendes dépasse le montant de 20.000 dirhams.
</p>
</div>
</div>
</div>
</div>
<?php require_once('foot.php'); ?>