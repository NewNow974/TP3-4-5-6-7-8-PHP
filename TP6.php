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
//$p2->display();

?>


<h2 style='color: #3cff49; text-decoration: underline;'>Exercice 3 :</h2>
<form action="TP6.php" method="post">
    Nom : <input type="text" name="nom"/>
    <br><br>
    Prénom : <input type="text" name="prenom"/>
    <br><br>
    Mail : <input type="text" name="mail"/>
    <br><br>
    Age : <select name="age">
        <option value="">--Age--</option>
        <option value="0-20">0-20</option>
        <option value="20-40">24-40</option>
        <option value="41-60">41-60</option>
        <option value="60 et +">60 et +</option>
    </select>
    <br><br>
    Monsieur : <input type="radio" value="monsieur" name="button"/>
    Madame : <input type="radio" value="madame" name="button"/>
    <br><br>
    <input type="submit" value="Envoyer"/>

</form>

<?php

class FormulaireRecup{
    private $nom;
    private $prenom;
    private $mail;
    private $age;
    private $genre;
    function __construct()
    {
        $this->nom=$_POST['nom'];
        $this->prenom=$_POST['prenom'];
        $this->mail=$_POST['mail'];
        $this->age=$_POST['age'];
        $this->genre=$_POST['button'];

    }

    function display() {
        echo "\nVous êtes ".$this->genre. " ".$this->nom." ".$this->prenom." vous avez ".$this->age." ans votre mail : ".$this->mail." !\n";
    }
}


if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['button'])) {
    $test=new FormulaireRecup();
    $test->display();
}


?>