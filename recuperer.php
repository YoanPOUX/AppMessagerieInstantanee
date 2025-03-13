<?php

include 'connexion.php';

$sql = "SELECT Id, horaire, auteur, contenu FROM messages ORDER BY horaire DESC LIMIT 10";
$result = $conn->query($sql);

$messages = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($messages);
?>
