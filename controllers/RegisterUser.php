<?php

//récuperer les infos de formulaire de signUp
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$age = $_POST['age'];

//hasher le mot de passe
$hash = md5($password);

include('../DAO.php');

//creer un nouveau objet DAO
$dao = new DAO();

if ($password == $password_confirmation) {
    if (!$dao->registerUser($first_name, $last_name, $email, $hash, $age)) {
        header("location:../connexion.php");
    } else {
        header("location:../inscription.php");
        die();
    }
} else {
    header("location:../inscription.php?error=comfirmationDeMotDePasse");
    die();
}
