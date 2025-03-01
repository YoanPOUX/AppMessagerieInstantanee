<?php
function SaveMessage($author, $content)
{
    $ini = parse_ini_file('./dbconfig.ini', true);
    $pdo = new PDO('mysql:host=localhost;dbname=projetr4a10', $ini['DB']['user'], $ini['DB']['password']);
    $statement = $pdo->prepare('INSERT INTO messages(auteur, contenu) VALUES(:h, :a, :c)');
    $statement->execute([
        ':h' => date('Y-m-d H:i:s'),
        ':a' => $author,
        ':c' => $content
    ]);
    
    return $pdo->lastInsertId(); // Retourne l'ID du message inséré
}

if(empty($_POST['author']) || empty($_POST['content']))
{
    header('location:./index.php');
    return;
}
SaveMessage($_POST['author'], $_POST['content']);
?>