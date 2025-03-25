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

function backHome(int $err) : void
{
    if($err == 2)
        header("Location: compte.php");
    if($err != 0)
        header("Location: index.php?err=$err");
    else
        header("Location: index.php");
}

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


if(isset($_POST['action'], $_POST['username'], $_POST['password']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];
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
        login($username, $pass);
    }
    elseif(isActionLogin())
        login($username, $pass);
}
else
{
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    backHome(2);
}
