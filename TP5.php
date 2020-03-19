
<h2 style='color: #3cff49; text-decoration: underline;'>Exercice 8 :</h2>
<?php
setcookie("cookie10", "test0");
setcookie("cookie11", "test1", time()+3600*24*7*2);
$tab=array(
    "nom11"=>"valeur1",
    "nom21"=>"valeur2",
    "nom31"=>"valeur3"
);
echo "Bonjour !";
//setcookie("nom111","valeur11" , time()+3600);
foreach ($tab as $x => $x_value)
{
    setcookie($x,$x_value , time()+3600);
    echo $_COOKIE[$x];
    echo "<br>";
}

//print_r($_COOKIE);  //Affiche tous les cookies de la page
?>



<h2 style='color: #3cff49; text-decoration: underline;'>Exercice 9 :</h2>
<?php
session_id('Lol');
session_start();
echo "Session id :  ".session_id();
$date = date("d-m-Y H:i:s",time());
$_SESSION['nom']= "Eloi";
$_SESSION['date']= $date;
echo "<br>";
echo "Bonjour ".$_SESSION['nom'];
echo "<br>";
echo "Ta première connexion était le ".$_SESSION['date'];
echo "<br>";
echo '<a href="TP5.php">Cliquer pour ouvrir votre site préfére</a>';
session_destroy();
?>


<!DOCTYPE html>
    <body>
        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 1 :</h2>
        <a href="TP5.php?valeur=-15">Cliquer pour avoir la valeur en degré</a>


        <?php

        if(isset($_GET['valeur']))
        {
            $value=$_GET['valeur'];
            $deg=(($value - 32) * 5/9);
            echo "nom : ".$deg;
        }

        ?>

        <form action="TP5.php" method="post">
                Valeur en Fahrenheit : <input type="text" name="valeur2"/>
                <input type="submit" value="Convertir"/>
        </form>

        <?php
            if(!empty($_POST['valeur2']))
            {
                $value22=$_POST['valeur2'];
                $deg2=(($value22 - 32) * 5/9);
                echo "La valeur en degre est  : ".$deg2;
            }

        ?>

        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 2 :</h2>
        <form action="TP5.php" method="post">
            Nom : <input type="text" name="nom"/>
            Prénom : <input type="text" name="prenom"/>
            <br>
            Débutant : <input type="radio" value="debutant" name="button"/>
            Avancé : <input type="radio" value="avance" name="button"/>
            <br>
            <input type="reset" value="Effacer"/>
            <input type="submit" value="Envoyer"/>
            <?php

                if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['button']))
                {
                    echo "Bonjour ".$_POST['prenom'].' '.$_POST['nom'].". Vous avez un niveau ".$_POST['button'];
                }
            ?>
        </form>


        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 3 :</h2>
        <form action="TP5.php" method="post">
            Nom : <input type="text" name="nom2"/>
            Prénom : <input type="text" name="prenom2"/>
            Age : <input type="text" name="age2"/>
            <br><br>
            Langues pratiqués (choisir au minimum 2)
            <br>
            <select name="langues[]" multiple="multiple">
                <option value="français"> français</option>
                <option value="anglais"> anglais</option>
                <option value="allemand"> allemand</option>
                <option value="espagnol"> espagnol</option>
            </select><br><br>
            Compétences informatiques (choisir au minimum 2)
            <br>
            HTML : <input type="checkbox" value="html" name="button2[]"/>
            CSS : <input type="checkbox" value="css" name="button2[]"/>
            PHP : <input type="checkbox" value="php" name="button2[]"/>
            SQL : <input type="checkbox" value="sql" name="button2[]"/>
            C : <input type="checkbox" value="c" name="button2[]"/>
            C++ : <input type="checkbox" value="c++" name="button2[]"/>
            JS : <input type="checkbox" value="js" name="button2[]"/>
            Python : <input type="checkbox" value="python" name="button2[]"/>
            <br>
            <input type="reset" value="Effacer"/>
            <input type="submit" value="Envoyer"/>
            <br>  <br>
            <?php


            if(!empty($_POST['nom2'])&&!empty($_POST['prenom2'])&&!empty($_POST['age2']))
            {
                echo "Vous êtes ".$_POST['prenom2'].' '.$_POST['nom2'].'<br>';
                echo "Vous avez ".$_POST['age2']. ' ans';

                $langues=$_POST['langues'];
                if(empty($langues[1]))
                {
                    echo "<br>Pas assez de langues séléctionnées !<br>";
                }
                else{
                    foreach($langues as $valeur){

                        echo " <li> $valeur </li>";
                    }
                }


                $Niv2=$_POST['button2'];
                if(empty($Niv2[1])){
                    echo "<br>";
                    echo "<div style='color: red;'>Pas assez de compétences séléctionnées.</div>";
                    echo "<br>";
                }
                else {
                    echo "<br>Vous avez des compétences informatiques en :<br>";
                    foreach ($Niv2 as $valeur) {
                        echo " <li> $valeur </li>";
                    }
                    echo "<br>";
                }
            }
            ?>
        </form>


        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 4 :</h2>
        <br>
        <form action="TP5.php" method="post">
            <div style="margin-left: 20%"> Nombre 1 : <input type="text" name="nb1"/></div>
            <br>
            <div style="margin-left: 20%"> Nombre 2 : <input type="text" name="nb2"/></div>
            <br>
            <div style="margin-left: 21%;"> Résultat : <input type="text" name="resultat" value="<?php calcul(); ?>"/> </div>
            <br>
            Cliquer sur un boutton : <input type="submit" value ="Addition x+y" name="operation">
            <input type="submit" value ="Soustraction x-y" name="operation">
            <input type="submit" value ="Division x/y" name="operation">
            <input type="submit" value ="Puissance x^y" name="operation">
        </form>
        <?php
        function calcul()
        {
            $result = 0;
            if (isset($_POST['operation'])) {
                $value1 = $_POST['nb1'];
                $value2 = $_POST['nb2'];
                $sign = $_POST['operation'];

                if ($value1 == '') {
                    echo "erreur nb1 ";
                }
                if ($value2 == '') {
                    echo "erreur nb2 ";
                }
                if ($sign == 'Addition x+y') {
                    $result = $value1 + $value2;
                    echo $result;
                }

                if ($sign == 'Soustraction x-y') {
                    $result = $value1 - $value2;
                    echo $result;
                }

                if ($sign == 'Division x/y') {
                    if ($value2 == 0){
                        echo "division par 0 erreur. ";
                    }
                    else {
                        $result = $value1 / $value2;
                        echo $result;
                    }
                }
                if ($sign == 'Puissance x^y') {
                    $result = pow($value1, $value2);
                    echo $result;
                }

            }
            return $result;
        }
        ?>


        <br>
        <br>
        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 5 :</h2>
        <form action="TP5.php" method="post" enctype="multipart/form-data">
            <p>
                Fichier 1: <input type="file" name="fichier1">
                <br>
                Fichier 2: <input type="file" name="fichier2">
                <br>
                Valider <input type="submit" value="Envoi">
            </p>

        </form>
        <?php

        if (isset($_FILES['fichier1']) AND $_FILES['fichier1']['error'] == 0 && isset($_FILES['fichier2']) AND $_FILES['fichier2']['error'] == 0)
        {
            $fichier1Name = $_FILES['fichier1']['name'];
            $fichier1Type = $_FILES['fichier1']['type'];
            $fichier1Tmp_Name = $_FILES['fichier1']['tmp_name'];
            $fichier1Error = $_FILES['fichier1']['error'];
            $fichier1Size = $_FILES['fichier1']['size'];

            $fichier2Name = $_FILES['fichier2']['name'];
            $fichier2Type = $_FILES['fichier2']['type'];
            $fichier2Tmp_Name = $_FILES['fichier2']['tmp_name'];
            $fichier2Error = $_FILES['fichier2']['error'];
            $fichier2Size = $_FILES['fichier2']['size'];


            move_uploaded_file($_FILES["fichier1"]["tmp_name"],$fichier1Name);
            move_uploaded_file($_FILES["fichier2"]["tmp_name"],$fichier2Name);

            echo "Envoyer ! ";
            echo "
                        <table width=60% border=1>
                        <thead>
                         <tr><th></th><th>Fichier 1</th><th>Fichier 2</th></tr>
                        </thead>
                        <tbody>
                        <tr><td>name</td><td>$fichier1Name</td><td>$fichier2Name</td></tr> 
                        <tr><td>type</td><td>$fichier1Type</td><td>$fichier2Type</td></tr> 
                        <tr><td>tmp_name</td><td>$fichier1Tmp_Name</td><td>$fichier2Tmp_Name</td></tr> 
                        <tr><td>error</td><td>$fichier1Error</td><td>$fichier2Error</td></tr>
                        <tr><td>size</td><td>$fichier1Size</td><td>$fichier2Size</td></tr>
                        <tr><td>Image</td><td><img src='$fichier1Name'></td><td><img src='$fichier2Name'></td></tr>
                        </tbody>
                        </table>";
        }
        ?>

        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 7 :</h2>
        <?php


            echo $_COOKIE['cookie10'];
            echo "<br>";
            echo $_COOKIE['cookie11'];
            echo "<br>";
            print_r($_COOKIE);
            //setcookie("cookie0", "", time()-3600); // Supprime le cookie
            //setcookie("cookie1", "", time()-3600);
            echo "<br>";
            echo $_COOKIE['cookie10'];
            echo "<br>";
            echo $_COOKIE['cookie11'];

        ?>



        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 10 :</h2>
        <?php

            $id_file=fopen("file.txt", "a+");
            //fwrite($id_file, "\nANSELMET Eloi");

            fclose($id_file);

            $id_file = fopen('file.txt', 'r+');
            if ($id_file) {
                $nb_ligne=0;
                while ($ligne=fgets($id_file)){
                    $nb_ligne++;
                    echo $nb_ligne." : ".$ligne.'<br>';
                }
            }
            if(!$id_file)
            {
                echo "Erreur d'accès au fichier";
            }

        echo '--------------------------------------------------------------<br><br>';

        $id_file=fopen("file.txt", "r+");
        if ($id_file) {
            $nb_ligne=0;
            while ($ligne=fgets($id_file)){
                $nb_ligne++;
                echo $ligne.'<br>';
            }
            fclose($id_file);
        }
        $lines = file('file.txt');
        $fp = fopen('fileTest.csv', 'w');
        fputcsv($fp, $lines);


        ?>

        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 11 :</h2>
        <?php

        $lignes = file("contact.txt");
        echo "<table border='1'>";
        for ($i=0; $i<count($lignes); $i++)
        {
            echo "<tr>";
            $personne=explode(";",$lignes[$i]);
            for($j = 0; $j < count($personne); $j++)
            {
                echo "<td>" . $personne[$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        ?>

        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 12 :</h2>
        Enregistrez vos informations personnelles <br>
        <form action="TP5.php" method="post">
            Votre nom : <input type="text" name="nom3"/>
            <br>
            Votre prénom : <input type="text" name="prenom3"/>
            <br>
            <input type="submit" value="Enregistrer" name="best"/>
            <input type="reset" value="Effacer"/>
            <br><br>
            <input type="submit" value="Supprimer la session" name="supp"/>
            <br>
        </form>
        <?php
        $compeur=1;

        session_start();
        if(!empty($_POST['supp'])) {
            session_destroy();
            unlink('file2.txt');
        }
        if(!empty($_POST['nom3'])&&!empty($_POST['prenom3']))
        {
            if (file_exists('file2.txt')) {
                $fichier = fopen('file2.txt', 'a');
            }
            else{
                $fichier = fopen('file2.txt', 'w');
            }
            $name = $_POST['nom3'];
            $prename = $_POST['prenom3'];
            $time=time();
            fwrite($fichier, $prename);
            fwrite($fichier, ';');
            fwrite($fichier, $name);
            fwrite($fichier, ';');
            fwrite($fichier, date('d/m/Y H:i:s',$time));
            fwrite($fichier, "\n");
        }

        $id_file=fopen("file2.txt", "r");
        echo "<table border='1'>";
        echo "<tr><td>Numéro</td><td>prénom</td><td>nom</td><td>date</td></tr>";
        echo "<tr>";
        if ($id_file) {
            $nb_ligne=0;
            while ($ligne=fgets($id_file)){
                echo "<tr>";
                $nb_ligne++;
                echo "<td>" . $nb_ligne . "</td>";
                $personne=explode(";",$ligne);
                for($j = 0; $j < count($personne); $j++)
                {
                    echo "<td>" . $personne[$j] . "</td>";
                }

                echo "</tr>";
            }
            $compeur=$nb_ligne;
            echo "</table>";
            fclose($id_file);
        }
        ?>

        <h2 style='color: #3cff49; text-decoration: underline;'>Exercice 14 :</h2>
        Enregistrez vos informations <br>
        <form action="TP5.php" method="post">
            Nom : <input type="text" name="nom5"/>
            <br>
            Prénom : <input type="text" name="prenom5"/>
            <br>
            Note : <input type="text" name="note5"/>
            <br>
            <input type="submit" value="Enregistrer"/>
            <input type="reset" value="Effacer"/>
            <br><br>
            <input type="submit" value="Supprimer la session" name="supp"/>
            <br>
        </form>
         <?php
            session_destroy();
            session_start();

            if(!empty($_POST['supp'])) {
                session_destroy();
            }
            if (isset($_SESSION['names']))
            {
                if (isset($_POST['Enregister']))
                {
                    array_push($_SESSION['names'],$_POST['nom5']);
                    array_push($_SESSION['Lnames'],$_POST['prenom5']);
                    array_push($_SESSION['note'],$_POST['note5']);
                }

            }
            else{
                $_SESSION['names'] = array();
                $_SESSION['Lnames'] = array();
                $_SESSION['note'] = array();
                array_push($_SESSION['names'],$_POST['nom5']);
                array_push($_SESSION['Lnames'],$_POST['prenom5']);
                array_push($_SESSION['note'],$_POST['note5']);
            }







             print_r($_SESSION['names']);
             print_r($_SESSION['Lnames']);
             print_r($_SESSION['note']);
            ?>

</body>
</html>

