<?php //Je suppose que vous avez déjà les variables php renseignées. Que ce soit un renseignement statique ou de données provenant de la base de données. Nommez vos variables selon les noms contenus dans le fichier template.html

// Je capture et mémorise le contenu du fichier template.html

$content = file_get_contents(dirname(__FILE__).'/print_html_attestation_travail.html'); // Attention au chemin d'accès au fichier template. ici, il est dans le même répertoire que export.php sinon donnez le chemin correct.

$content = str_replace('##NOM##', $logo, $content);
$content = str_replace('##CIN##', $civilite, $content);
$content = str_replace('##QUALITE##', $nom, $content);
$content = str_replace('##DATEEMBAUCHE##', $prenom, $content);
$content = str_replace('##DATESIGNATURE##', $adresse, $content);

// La suite du fichier à l'étape 3

 ?>