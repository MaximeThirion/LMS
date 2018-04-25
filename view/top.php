
<?php

if (isset($_POST['bouton_deconnexion'])) {
    header('Location: http://localhost:8080/auth/logout');
}

if (isset($_POST['bouton_connexion'])) {
    header('Location: http://localhost:8080/auth/login');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LMS by Grand EST</title>
    <link rel="stylesheet" href="/view/assets/css/style.css">
    <link rel="stylesheet" href="/view/assets/css/bootstrap.min.css">
    <script src="../config/script.js"></script>
</head>
<body style="color: white">

<?php

if ($user_id) {?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="#">Accueil</a>
    <form method="post" class="form-inline">
        <a href="" class="nav-link text-light mr-sm-0"><?=$USER->firstname?> <?=$USER->lastname?></a>
        <button class="btn font-weight-bold my-2 my-sm-0" name="bouton_deconnexion" type="submit">DECONNEXION</button>
    </form>
</nav>

<?php }
else { ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="#">Accueil</a>
    <form method="post" class="form-inline my-0 my-lg-0">
        <button class="btn font-weight-bold my-2 my-sm-0" name="bouton_connexion" type="submit">CONNEXION</button>
    </form>
</nav>

<?php }

?>