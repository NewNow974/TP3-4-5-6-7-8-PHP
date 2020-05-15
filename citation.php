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
$db=connexpdo($base, $user, $password);

$nbr_citations = 0;

echo '<div class="container col-sm-9 jumbotron" ><h1>La citation du jour</h1><hr>';

$query0 = "SELECT phrase FROM citation";
$nbr = $db->query($query0);
foreach ($nbr as $data) {
    $nbr_citations++;
}
$r=rand (1, $nbr_citations);


echo '<p>Il y a <strong>'. $nbr_citations .' </strong> citations répertoriées.</p>';
echo "<p>Et voici l'une d'entre elles qui est générée aléatoirement : </p>";


//Citation de la BDD
$query1 = "SELECT phrase, auteurid, siecleid FROM citation WHERE id = ".$r;
$citation = $db->query($query1);
foreach ($citation as $data){
    echo '<p><strong>'.$data['phrase'].'</strong></p>';
    $auteurid = $data['auteurid'];
    $siecleid = $data['siecleid'];
}

//Auteur de la citation
$query2= "SELECT nom, prenom FROM auteur WHERE id =". $auteurid;
$auteur = $db->query($query2);
foreach ($auteur as $data){
    echo "<p><i>". $data['prenom'] ." ". $data['nom'] . "</i> ";
}

//Siècles de la BDD
$query3 = "SELECT numero FROM siecle WHERE id=".$siecleid;
$siecle = $db->query($query3);
foreach ($siecle as $data){
    echo $data['numero'] . "ème siècle </></p></div></body></html>";
}
?>


</body>

</html>

