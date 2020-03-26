<?php


class Formulaire
{
    protected $html = "";
    private $interieur = "";
    function __construct($fichier, $method)
    {
        $this->html .= "<form method='$method' action='$fichier'>";
    }
    function ajouterzonetexte($text){
        $this->html .= $text." <input type='text'name='nom6'/><br><br>";
    }
    function ajouterbouton(){
        $this->html .= "<button>Cliquez ici</button><br>";
    }
    function getform(){
        return $this->html . "</form>";
    }
}





?>