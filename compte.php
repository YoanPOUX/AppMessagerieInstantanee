<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion au compte utilisateur</title>
</head>
<body>
    <form method="post" action="connexioncompte.php">
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="action" value="Se connecter">
    </form>
    <form method="post" action="connexioncompte.php">
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="action" value="Créer un compte">
    </form>
</body>
</html>
