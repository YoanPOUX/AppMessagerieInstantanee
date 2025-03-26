<?php
include_once 'connexion.php';
// Simple enregistrement de message dans la base de données

$pdo = getPDO();

$auteur = $_POST['auteur'];
$contenu = $_POST['contenu'];

$pdo->beginTransaction();
$sql = "INSERT INTO messages (auteur, contenu) VALUES (:a, :c)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'a' => $auteur,
    'c' => $contenu]);
$pdo->commit();
// Fermer la connexion
?>