<?php
// Informations de connexion à la base de données

function getPDO() : PDO
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projetr4a10";

    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

?>
