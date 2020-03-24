<?php

class equipe
{

    static $nombreEquipe=0;
    const message = "Nombre d'équipe : ";
    private $nom;
    private $nombreTitre;

    public function getNombreTitre()
    {
        return $this->nombreTitre;
    }

    public function setNombreTitre($nombreTitre)
    {
        $this->nombreTitre = $nombreTitre;
    }

    public function setName($nom1) {
        $this->nom = $nom1;
    }
    public function getName() {
        return $this->nom;
    }

    // Méthodes
    function __construct($nom1, $nbTitre) {
        $this->nom = $nom1;
        $this->nombreTitre = $nbTitre;
        self::$nombreEquipe++;
    }
    function __destruct(){
        echo "Fin\n";
    }
    function display() {
        echo "\nL'équipe ".$this->nom." à ".$this->nombreTitre." titres. ". equipe::message.self::$nombreEquipe." !\n";
    }





}
/*
$p1 = new equipe();
$p1->setName("Paris");
$p1->setNombreTitre(11);
$p1->display();*/

$p2=new equipe("Lyon", 14);
$p3=new equipe("Lyon", 14);
$p4=new equipe("Lyon", 14);
$p2->display();


?>