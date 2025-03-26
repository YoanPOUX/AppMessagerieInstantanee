<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion au compte utilisateur</title>
    <link rel="icon" type="image/svg" href="assets/messages-square.svg">
</head>
<body>
    <h1>Connexion à un compte utilisateur</h1>
    <form class="logform" method="post" action="db/connexioncompte.php">
        <h2>Se connecter à un compte existant</h2>
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="action" value="Se connecter">
    </form>
    <form class="logform" method="post" action="db/connexioncompte.php">
        <h2>Créer un compte</h2>
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="action" value="Créer un compte">
    </form>
</body>
</html>
