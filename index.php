<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header("location:connexion.php?error=true");
}
include_once('DAO.php');
$dao = new DAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b9398f24d6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Liste des utilisateur</title>
</head>

<body>
    <div class="main">
        <h1>Liste des Utilisateurs</h1>
        <table class="table table-bordered thead-dark table-striped">
            <thead>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $listeUsers = $dao->listUsers();
                foreach ($listeUsers as $user) {
                    echo '
                <tr>
                    <td>' . $user[1] . '</td>
                    <td>' . $user[2] . '</td>
                    <td>' . $user[5] . '</td>
                    <td>';
                    //afficher la button de modification que le pour le profil connecter 

                    if ($user[3] == $_SESSION['email']) {
                        echo '<a href="updateUser.php?userId=' . $user['0'] . '" class="btn btn-primary" >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>';
                    }

                    echo '<a href="controllers/DeleteUser.php?userId=' . $user[0] . '" class="btn btn-primary">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                  </td>
                </tr>
                ';
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>