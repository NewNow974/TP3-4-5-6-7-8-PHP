
<?php


include "formulaire.php";

$p1 = new Formulaire("result.php","post");
$p1->ajouterzonetexte("Votre nom :");
$p1->ajouterzonetexte("Votre code :");
$p1->ajouterbouton();
echo $p1->getform();
?>