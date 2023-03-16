<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header("location:connexion.php?error=true");
}
include_once('DAO.php');
$dao = new DAO();
if (!isset($_GET['userId'])) {
    header("location:index.php?error=true");
} else {
    $userId = $_GET['userId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Insription</title>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Modifier votre account</h2>

                                <form action="controllers/UpdateUser.php" method="POST">
                                    <?php
                                    include_once('DAO.php');
                                    $dao = new DAO();
                                    $listInformation = $dao->getUserInformations($userId);
                                    foreach ($listInformation as $info) {
                                        echo '
                                        <div class="form-outline mb-4">
                                            <input type="hidden" name="userId" value="' . $info[0] . '">
                                            <input type="text" id="form3Example1cg" value="' . $info[1] . '" name="first_name" placeholder="Votre prénom" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example3cg" value="' . $info[2] . '" name="last_name" placeholder="Votre nom" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" value="' . $info[3] . '" name="email" placeholder="Votre e-mail" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="number" id="form3Example3cg" value="' . $info[5] . '" name="age" placeholder="Votre Age" class="form-control form-control-lg" />
                                        </div>

                                        ';
                                    }
                                    ?>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" name="password" placeholder="Mot de passe" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg" name="password_confirmation" placeholder="Récrire le mot de passe" class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Modifier</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>