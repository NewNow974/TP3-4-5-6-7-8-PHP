<?php

echo "Hello World !";
echo"<hr>";
echo "<h2 style='color: #3cff49; text-decoration: underline;'>Exercice 1 :</h2>";
echo"<br>";


echo 'EN : '.date("l jS F Y");
echo"<br>";

setlocale( LC_TIME, "fr_FR.utf8");
echo strftime("FR : %A  %d %B %Y", time());
echo"<br>";

echo 'Date et heure : '.date("d/m/Y").' '.date("H:i");
echo"<br>";
echo 'Il est passé '. time().'s depuis les premières apparitions d\'UNIX';

echo"<hr>";
echo "<h2 style='color: #f34bff; text-decoration: underline;'>Exercice 2 :</h2>";
echo"<br>";

function age($born)
{

    $date2 = date_create();
    date_date_set($date2, 2020, 2, 18);

    $date1 = new DateTime("now");
    $date2 = new DateTime($born);
    echo "Date de naissance : ".strftime("%d-%m-%Y",mktime(0,0,0,05,13,2000))."<br>";
    echo "Date du jour : ".strftime("%d-%m-%Y",time())."<br>";
    $datediff = date_diff($date1,$date2);
    $secondes = $date1->format("%U")-$date2->format("%U");
    echo "Age : ".$datediff->format("%Y ans %m mois et %D jours")." = ".$datediff->days." jours = ".($datediff->days*86400)." secondes";

    echo"<br>";

}


age("31-07-1991");



echo "<h2>Exo3</h2>";
//09 février 2020 à 08h34min35s
echo"derniere pleine lune : ";
$date1 = new DateTime("2020-02-09 08:34:35");
echo $date1->format('Y-m-d H:i:s');
echo "<br>";

echo"prochaine pleine lune : ";
$interval = new DateInterval('P29DT12H44M3S');
$date1->add($interval);
echo $date1->format('Y-m-d H:i:s');
for($i = 0 ; $i<100 ; $i++){
    $date1->add($interval);
}
echo "<br>";
echo"prochaine 100ieme pleine lune : ";
echo $date1->format('Y-m-d H:i:s');

echo "</br> <h3> Exercice 4 </h3> </br>";
if (checkdate(02,29,1962) == true) {
    echo "La date existe </br>";
} else {
    echo "La date n'existe pas </br>";
}

echo "</br> <h3> Exercice 5 </h3> </br>";
$date = date('d-m-Y',mktime(0,0,0,3,3,1993));
echo date('l',strtotime($date))."</br>";


echo "</br> <h3> Exercice 6 </h3> </br>";
$year = 2020;
for ($year;$year<=2062;$year++) {
    if (checkdate(02,29,$year) == true) {
        echo $year."</br>";
    }
}

echo "<h1>Exercice6</h1>";
for($annee=2020;$annee<=2062;$annee++){
    $date = mktime(0,0,0,1,1,$annee);
    if(date("L",$date)){
        echo "L'année $annee est une année bisextile<br>";
    }
}

echo "</br> <h3> Exercice 7 </h3> </br>";
$year = 2020;
for ($year;$year<=2030;$year++) {
    $date = date('d-m-Y',mktime(0,0,0,5,1,$year));
    $day = date('w',strtotime($date));
    if($day == 1 || $day == 5) {
        echo $year." : WE prolongé </br>";
    } else {
        echo $year." : WE non prolongé </br>";
    }
}

?>

