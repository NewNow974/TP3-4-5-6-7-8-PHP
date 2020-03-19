<?php
echo "<h1>TP numéro 1</h1>";
echo "<hr>";
echo "<h2>Exercice 1:</h2>";


echo "1 - le livre ma vie est terrible !! <br>";
echo "2 - le livre \"ma vie\" est terrible !! <br>";
echo '3 - le livre "ma vie" est terrible !! <br>';
echo "4 - le livre ma vie est terrible !! et le public l'apprécie<br><br>";
$mavie = "Marry you";
echo "5 - le livre $mavie est terrible !! <br>";
echo "6 - le livre $mavie est terrible !! <br>";

echo "<hr>";
echo "<h2>Exercice 2:</h2>";
$auteur="<b>Citation de Coluche</b>";
$auteur=strtoupper($auteur);
echo "<i>J'ai l'esprit large et je n'admets pas qu'on dise le contraire.</i> $auteur";


echo "<hr>";
echo "<h2>Exercice 3:</h2>";
$auteur="<b>Citation de Coluche</b>";
$citation="<i>J'ai l'esprit large et je n'admets pas qu'on dise le contraire.</i>";
echo "$citation $auteur <br><br>";
if (isset($auteur) == true)
{
    echo "True ! ";
}
if (isset($citation) == true)
{
    echo "True ! ";
}
var_dump($auteur);
var_dump($citation);
unset($auteur);
unset($citation);
if (isset($auteur) == false)
{
    echo "False ! ";
}
if (isset($citation) == false)
{
    echo "False ! ";
}

echo "<hr>";
echo "<h2>Exercice 4:</h2>";
echo "$_SERVER Ettt $GLOBALS";

echo "<hr>";
echo "<h2>Exercice 5:</h2>";

ini_set('upload_max_filesize', '2M');
ini_alter("upload_max_filesize", "2M");

echo ini_get('display_errors');
echo "<br>";
echo ini_get('upload_max_filesize');
echo phpinfo();
?>