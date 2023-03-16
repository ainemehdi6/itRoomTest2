<?php

//récuperer les infos de formulaire de login
$email = $_POST['email'];
$password = $_POST['password'];

//hasher le mot de passe
$hash = md5($password);

include('../DAO.php');
$dao = new DAO();

if ($dao->authentificationUser($email, $hash)) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $hash;
    header("location:../index.php");
} else {
    header("location:../connexion.php");
    die();
}
