<?php

//récuperer les infos de GET
$userId = $_GET['userId'];

include('../DAO.php');
$dao = new DAO();

if (!$dao->deleteUser($userId)) {
    header("location:../index.php?succes=true");
} else {
    header("location:../index.php?error=true");
    die();
}
