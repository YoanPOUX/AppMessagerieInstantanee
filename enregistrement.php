<?php
include_once 'connexion.php';

$pdo = getPDO();

$auteur = $_POST['auteur'];
$contenu = $_POST['contenu'];
$timestamp = time();

$pdo->beginTransaction();
$sql = "INSERT INTO messages (horaire, auteur, contenu) VALUES (:t, :a, :c)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    't' => $timestamp,
    'a' => $auteur,
    'c' => $contenu]);
$pdo->commit();
// Fermer la connexion
?>