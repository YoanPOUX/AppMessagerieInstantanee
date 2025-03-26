<?php
require './connexion.php';
session_start();

/*
 * Error 1 : invalid credentials
 * Error 2 : logging out
 * */

function isActionCreate() : bool
{
    return
        isset($_POST['action']) && $_POST['action'] === "Créer un compte";
}

function isActionLogin() : bool
{
    return
        isset($_POST['action']) && $_POST['action'] === "Se connecter";
}

// gère les redirections en fonction des codes d'erreur
function backHome(int $err) : void
{
    if($err == 2)
        header("Location: compte.php");
    if($err != 0)
        header("Location: compte.php?err=$err");
    else
        header("Location: index.php");
}

// gère la connexion à un compte existant
function login($uname, $pwd) : void
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = :username LIMIT 1");
    $result = $stmt->execute([':username' => $uname]);
    if($result && $stmt->rowCount() === 1)
    {
        $user = $stmt->fetch();
        if(password_verify($pwd, $user['password']))
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            backHome(0);
            return;
        }
        else
        {
            echo 'Erreur lors de l\'authentification';
            backHome(1);
        }
    }
}

// si toutes les variables nécessaires sont renseignées
if(isset($_POST['action'], $_POST['username'], $_POST['password']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];
    // si on souhaite créer un compte
    if(isActionCreate())
    {
        // Créer un nouveau compte en base de données
        $password = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO utilisateurs (username, password) VALUES (:u, :p)";
        $pdo = getPDO();
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ":u" => $username,
            ":p" => $password
        ]);
        // connexion automatique au nouveau compte
        login($username, $pass);
    }
    // si on souhaite juste se connecter à un compte existant
    elseif(isActionLogin())
        login($username, $pass);
}
// si aucune variable n'est renseignée, nettoyer les informations de session
else
{
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    // redirection vers la page de connexion
    backHome(2);
}
