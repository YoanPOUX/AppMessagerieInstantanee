<?php

include_once 'connexion.php';

// retourne une chaîne de caractères contenant un tableau json d'objets
// serialisés (les messages et leurs contenus respectifs)

$sql = "SELECT Id, horaire, auteur, contenu FROM messages ORDER BY horaire DESC LIMIT 10";
$pdo = getPDO();
$stmt = $pdo->prepare($sql);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode(array_reverse($messages));
?>
