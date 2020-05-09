<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Site</title>
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="citation.php">Informations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="recherche.php">Recherche</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="modification.php">Modification</a>
        </li>
    </ul>
</nav>
<?php
include "connexpdo.php";

echo "Start connexion !<br><br>";
$base = 'pgsql:dbname=citations;host=localhost;port=5432';
$user = 'postgres';
$password = 'azerty123';
$dbh=connexpdo($base, $user, $password);


echo "<h1>La citation du jour</h1><br><hr>";
$query = 'SELECT count(*)  FROM citation';
$sth = $dbh->query($query);
$sth->execute();
$result=$sth->fetchAll();

foreach($result as $data)
{
    echo "Il y a <b>$data[0]</b> citations répertoriées.";
}
echo "Et voici l'une d'entre elles qui est générée aléatoirement :<br>";
$var = random_int(0, $data[0]);

$query = 'SELECT id, phrase  FROM citation';
$sth = $dbh->query($query);
$sth->execute();
$result=$sth->fetchAll();

?>


</body>

</html>
