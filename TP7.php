<?php

//Exercice 1
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

//Exercice 2
interface Shape
{
    function getArea();
}

class Square implements Shape {
    private $height;
    private  $width;

    public function __construct($width, $height)
    {
        $this->width=$width;
        $this->height=$height;
    }

    function getArea()
    {
        return $this->height*$this->width;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getArea()
    {
        return 3.14*$this->radius*$this->radius;
    }
}

$q1 = new Square(5, 5);
$c1 = new Circle(7);
$tab=array($q1,$c1);

foreach ($tab as $obj)
{
    echo get_class($obj). "Area : ".$obj->getArea()." <br>";
}

//Exercice 3
trait Un{
    function small($text){
        echo "<small>$text</small>";
    }
    function big($text){
        echo "<h4>$text</h4>";
    }
}

trait Deux{
    function small($text){
        echo "<i>$text</i>";
    }
    function big($text){
        echo "<h2>$text</h2>";
    }
}

class Texte{
    use Un, Deux{
        Deux::small insteadof Un;
        Un::big insteadof Deux;

        Deux::big as gros;

        Un::small as petit;
    }
}

$t1=new Texte();
$t1->small("Small");
$t1->big("Big");
$t1->gros("Gros");
$t1->petit("Petit");
?>