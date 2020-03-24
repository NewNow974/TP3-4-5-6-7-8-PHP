<?php


class Formulaire
{
    // Méthodes
    function __construct($nom1, $nbTitre) {
        $this->nom = $nom1;
        $this->nombreTitre = $nbTitre;
        self::$nombreEquipe++;
    }
    function __destruct(){
        echo "Fin\n";
    }
}

?>