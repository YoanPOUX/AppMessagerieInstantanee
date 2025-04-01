<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion au compte utilisateur</title>
    <link rel="icon" type="image/svg" href="assets/messages-square.svg">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<main>
    <?php
    if($_GET["err"] == 1)
        echo '<h1>Erreur: identifiants non reconnus</h1>';
    elseif($_GET["err"] == 2)
        echo '<h1>Déconnexion effectuée</h1>';

    ?>
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
</main>
</body>
</html>
