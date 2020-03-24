<?php


class Formulaire
{
    private $html="";
    private $interieur="";
    function __construct($nom_Fichier, $methodeEnvoie) {

        $this->html= "<form action=$nom_Fichier method=$methodeEnvoie>$this->interieur</form>";
    }

    function ajouterzonetexte()
    {
        $this->interieur.="<input type='text'name='nom6'/>";
    }

    function ajouterbouton()
    {
        $this->interieur.="<input type='submit' value='Enregister'/>";
    }

    function getform()
    {
        echo $this->html;
    }

    function __destruct(){
        echo "Fin\n";
    }

}


$p1= new Formulaire("fichier.php", "post");
$p1->ajouterzonetexte();
$p1->ajouterzonetexte();
$p1->ajouterbouton();




?>