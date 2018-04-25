
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">

<?php

if ($user_id) {?>

<a class="navbar-brand" href="/dashboard">Accueil</a>
<form method="post" class="form-inline">
    <a href="/profile" class="nav-link text-light mr-sm-0"><?=$USER->getPresentation()?></a>
    <button class="btn font-weight-bold my-0 my-sm-0" name="bouton_deconnexion" type="submit">DECONNEXION</button>
</form>

<?php }
else { ?>

<a class="navbar-brand" href="http://localhost:8080">Accueil</a>
<form method="post" class="form-inline">
    <button class="btn font-weight-bold my-0 my-sm-0" name="bouton_connexion" type="submit">CONNEXION</button>
</form>

<?php } ?>

</nav>