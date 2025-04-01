<?php
// Informations de connexion à la base de données

function getPDO() : PDO
{
    $ini = parse_ini_file('db.ini', true);
    $servername = $ini['database']['host'];
    $username = $ini['database']['username'];
    $password = $ini['database']['psw'];
    $dbname = $ini['database']['dbname'];

    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

?>
