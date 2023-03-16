<?php

//récuperer les infos de formulaire de signUp
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$age = $_POST['age'];
$userId = $_POST['userId'];

//hasher le mot de passe
$hash = md5($password);

include('../DAO.php');

//creer un nouveau objet DAO
$dao = new DAO();

if ($password == $password_confirmation) {
    if (!$dao->updateUser($first_name, $last_name, $email, $hash, $age, $userId)) {
        header("location:../index.php");
    } else {
        header("location:../index.php?error=true");
        die();
    }
} else {
    header("location:../index.php?error=comfirmationDeMotDePasse");
    die();
}
