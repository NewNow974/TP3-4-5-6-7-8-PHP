
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

</body>
<?php
include "connexpdo.php";

echo "Start connexion !<br><br>";
$base = 'pgsql:dbname=citations;host=localhost;port=5432';
$user = 'postgres';
$password = 'azerty123';


//Connect BDD
try{
    $db=connexpdo($base, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //pour activer l'affichage des erreurs pdo
} catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

echo '<div class="container col-sm-9 jumbotron" ><h1>Ajouter une citation</h1><hr>
        <form method="POST" action="modification.php">
            <div class="form-group">
                <label>ID de l\'auteur</label>
                <input name="authorId" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nom de l\'auteur</label>
                <input name="authorLastName" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prénom de l\'auteur</label>
                <input name="authorFirstName" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ID du siècle</label>
                <input name="centuryId" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Siècle</label>
                <input name="century" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Citation</label>
                <input name="citation" type="text" class="form-control" required>
            </div><br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
<br><br>';

echo '<h1>Supprimer une citation</h1><hr><br>
        <form method="POST" action="modification.php">
            <div class="form-group">
                <select class="form-control" name="citationChoiceId">
                    <option selected disabled>Sélectionnez l\'ID d\'une citation</option>';
$query = "SELECT id, phrase FROM citation";
$numero = $db->query($query);
foreach ($numero as $data){
    echo "<option value=".$data['id'].">".$data['phrase']."</option>";
}

echo'           </select>
             </div><br>
            <button type="submit" class="btn btn-primary">Supprimer</button>
        </form>
';

echo '</div>';

//Formulaire d'ajout

if(isset($_POST['authorId']) && isset($_POST['authorLastName']) && isset($_POST['authorFirstName']) && isset($_POST['centuryId']) && isset($_POST['century']) && isset($_POST['citation'])) {

    $sql2 = "INSERT INTO auteur (id, nom, prenom) VALUES (?, ?, ?)";
    $sqlR2 = $db->prepare($sql2);
    $sqlR2->execute([$_POST['authorId'], $_POST['authorLastName'], $_POST['authorFirstName']]);


    $sql3 = "INSERT INTO siecle (id, numero) VALUES (?, ?)";
    $sqlR3 = $db->prepare($sql3);
    $sqlR3->execute([$_POST['centuryId'], $_POST['century']]);



    $nbr_citations=$_POST['centuryId']+$_POST['authorId'];

    $sql4 = "INSERT INTO citation (id, phrase, auteurid, siecleid) VALUES (?, ?, ?, ?)";
    $sqlR4 = $db->prepare($sql4);
    $sqlR4->execute([$nbr_citations, $_POST["citation"], $_POST['authorId'], $_POST['centuryId']]);

}

//Formulaire de Suppression
if (isset($_POST['citationChoiceId']))
{
    $citationId=$_POST['citationChoiceId'];
}


if(isset($_POST['citationChoiceId'])) {
    $db->exec("DELETE FROM citation WHERE id=" . $citationId);
}
?>