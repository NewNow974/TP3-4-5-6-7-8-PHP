
<?php


class Formulaire
{
    private $html = "";
    private $interieur = "";
    function __construct($fichier, $method)
    {
        $this->html .= "<form method='$method' action='$fichier'>";
    }
    function ajouterzonetexte($text){
        $this->html .= $text." <input type='text'name='nom6'/><br><br>";
    }
    function ajouterbouton(){
        $this->html .= "<button>Cliquez ici</button>";
    }
    function getform(){
        return $this->html . "</form>";
    }
}

$p1 = new Formulaire("result.php","post");
$p1->ajouterzonetexte("Votre nom :");
$p1->ajouterzonetexte("Votre code :");
$p1->ajouterbouton();
echo $p1->getform();
?>