<?php

include "connexpdo.php";

echo "Start connexion !<br><br>";
$base = 'pgsql:dbname=citations;host=localhost;port=5432';
$user = 'postgres';
$password = 'azerty123';
$dbh=connexpdo($base, $user, $password);

echo "<h2>Auteurs de la BD</h2>";
$query = 'SELECT nom, prenom  FROM auteur';
$sth = $dbh->query($query);
$sth->execute();
$result=$sth->fetchAll();

echo "<table> 
        <tr>
            <td>nom</td>
            <td>prénom</td>
        </tr>";
foreach($result as $data)
{
    echo "<tr>";
    echo "<td>".$data[0]."</td>";
    echo "<td>".$data[1]."</td>";
    echo "</tr>";

}
echo "</table>";

echo "<h2>Citations de la BD</h2>";
$query = 'SELECT phrase  FROM citation';
$sth = $dbh->query($query);
$sth->execute();
$result=$sth->fetchAll();

foreach($result as $data)
{
    echo $data[0]."<br>";

}

echo "<h2>Siècle de la BD</h2>";
$query = 'SELECT numero  FROM siecle';
$sth = $dbh->query($query);
$sth->execute();
$result=$sth->fetchAll();

foreach($result as $data)
{
    echo $data[0]."<br>";

}

echo "<br><br>Fin !";


?>