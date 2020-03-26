<?php
 include ("formulaire.php");
class form2 extends Formulaire{

    function ajouterboutonRadioCase($value, $name){
       $this->html .= "<br><b>$name</b><input type=$value value=$name name='button'/>";
    }

}



$p1 = new form2("TP7.php","post");
$p1->ajouterzonetexte("Votre nom :");
$p1->ajouterzonetexte("Votre code :");
$p1->ajouterbouton();
$p1->ajouterboutonRadioCase("radio", "Homme");
$p1->ajouterboutonRadioCase("radio", "Femme");
$p1->ajouterboutonRadioCase("checkbox", "Tennis");
$p1->ajouterboutonRadioCase("checkbox", "Equitation");
echo $p1->getform();
?>