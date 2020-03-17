<?php



echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 1 :</h2>";
echo"<br>";


$var=0;
$incrémentation=function(&$var)
{
    $var=$var+1;
    echo $var."<br>";
};

$incrémentation($var);
$incrémentation($var);

echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 2 :</h2>";
echo"<br>";

$var2=5;
function modifieValeur(&$var, $newVar)
{
    $var=$var+$newVar;
};

echo $var2;
echo"<br>";
modifieValeur($var2, 2);
echo $var2;

echo "<h2 style='color: red; text-decoration: underline;'>Exercice 3 :</h2>";
echo"<br>";


$identite = ['alain', 'basile', 'David', 'Edgar'];
$age = [1, 15, 35, 65];
$mail = ['penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr'];

function mailReturn($mail)
{

    $split=substr($mail,strpos($mail, '@'), strlen($mail));
    $split2=substr($split,strpos($split, '.'), strlen($split));
    $split=substr($split, 0, strpos($split, '.'));

    $tab=[$split,$split2];


    return $tab;

}
for ($i=0;$i<  sizeof($mail);$i++) {
    print_r(mailReturn($mail[$i]));
    echo "<br>";
}


function Arg($identite, $age, $mail, $indice)
{
    echo $indice;
    for ($i=0; $i<4; $i++)
    {
        echo"<br>";
        $identite[$i][0]=strtoupper($identite[$i]);
        echo "Je me nomme $identite[$i] j'ai ";
        echo "$age[$i]";
        if ($age[$i]<$indice)
        {
            echo " an";
        }
        else{
            echo " ans";
        }
        $tab=mailReturn($mail[$i]);
        echo " et mon mail est $mail[$i] du domaine $tab[0] avec l'extension $tab[1]";
        echo"<br>";
    }
}

Arg($identite, $age, $mail, random_int(0,65));

echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 4 :</h2>";
echo"<br>";

function ligne($taille)
{
    for ($i=0; $i<$taille; $i++){
        echo " * ";
    }
}

echo "<br>Ligne : <br>";
ligne(10);

function carre_plein($taille){
    for ($i=0;$i<$taille;$i++)
    {
        ligne($taille);
        echo "<br>";
    }
}

echo "<br>Carré plein : <br>";
carre_plein(5);


function triangle_iso($taille){
    for ($i=0;$i<=$taille;$i++)
    {
        ligne($i);
        echo "<br>";
    }
}

triangle_iso(5);

echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 5/6 :</h2>";
echo"<br>";


function cryptage(&$msg, $pas) {
    for ($i=0;$i<strlen($msg);$i++) {
        if(ord($msg[$i]) >= 65 && ord($msg[$i]) <= 90 || ord($msg[$i]) >= 97 && ord($msg[$i]) <= 122) {
            if (ord($msg[$i]) > 90 - $pas || ord($msg[$i]) > 122 - $pas) {
                $msg[$i] = chr(ord($msg[$i]) + -26 + $pas);
            } else {
                $msg[$i] = chr(ord($msg[$i]) + $pas);
            }
        }
    }

}

function decryptage(&$msg, $pas) {
    for ($i=0;$i<strlen($msg);$i++) {
        if(ord($msg[$i]) >= 65 && ord($msg[$i]) <= 90 || ord($msg[$i]) >= 97 && ord($msg[$i]) <= 122) {
            if (ord($msg[$i]) >= 65 + $pas || ord($msg[$i]) >= 97 + $pas) {
                $msg[$i] = chr(ord($msg[$i]) - $pas);
            } else {
                $msg[$i] = chr(ord($msg[$i]) +26 - $pas);
            }
        }
    }
}
$msg="BONJOURZ";
cryptage($msg, 1);
echo $msg.'<br>';
decryptage($msg, 1);
echo $msg;


echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 7/8 DONE :</h2>";
echo"<br>";

echo"<hr>";
echo "<h2 style='color: red; text-decoration: underline;'>Exercice 11 :</h2>";
echo"<br>";


function luhn_somme($tab) {
    $code=[];
    for ($l=0; $l<strlen($tab); $l++)
    {
     $code[$l]=substr($tab, $l, 1);
    }
    $taille = sizeof($code);
    $somme = 0;
    for ($i = $taille-1; $i >= 0; $i--) {
        $d = $code[$i];
        if ($i % 2 == 0) {
            $d=$d*2;
        }
        if ($d >= 10) {
            $d=$d%10+intval($d/10);
        }
        if ($i != $taille-1)
        {
            $somme= $somme + $d;
        }

    }
    echo "Somme = $somme";
    $sommeModulo=$somme%10;

    if (10-$sommeModulo == $code[$taille-1])
    {
        echo "Code valide !";
    }
    else{
        echo "Le code n'est pas valide !";
    }
}


$code=5382350133466355;
luhn_somme($code);

?>

