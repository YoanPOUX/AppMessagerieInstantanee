<?php

include_once 'connexion.php';

$sql = "SELECT Id, horaire, auteur, contenu FROM messages ORDER BY horaire LIMIT 10";
$pdo = getPDO();
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$messages = [];

if (count($rows) > 0) {
    foreach ($rows as $row) {
        // appends at the end of array
        $messages[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
?>
