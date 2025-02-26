<?php
function GetMessage($time = null)
{
    $ini = parse_ini_file('./dbconfig.ini', true);
    $pdo = new PDO('mysql:host=localhost;dbname=projetr4a10', $ini['DB']['user'], $ini['DB']['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active le mode exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if ($time === null) {
        $statement = $pdo->prepare('SELECT * FROM messages ORDER BY horaire DESC, Id DESC LIMIT 10;');
        $statement->execute();
    } else {
        $statement = $pdo->prepare('SELECT * FROM messages WHERE horaire > :h ORDER BY horaire DESC, Id DESC LIMIT 10;');
        $statement->execute([
            ':h' => date('Y-m-d H:i:s', strtotime($time))
        ]);
    }

    return $statement->fetchAll()
}


if(empty($_POST['time']))
{
    header('location:./index.php');
    return;
}
GetMessage($_POST['time']);
?>