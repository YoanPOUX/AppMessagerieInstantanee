<?php
include 'connexion.php';

$auteur = $_POST['auteur'];
$contenu = $_POST['contenu'];
$timestamp = time();

$sql = "INSERT INTO messages (horaire, auteur, contenu) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param($time, $auteur, $contenu);

if ($stmt->execute()) {
    echo "Message enregistré avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>