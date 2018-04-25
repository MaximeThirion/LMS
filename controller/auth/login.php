
<?php

$email = array_key_exists('email', $_POST) ? $_POST['email'] : '';
$password = array_key_exists('password', $_POST) ? $_POST['password'] : '';
$error_message = '';


if (strlen($password) >= 8) {

    foreach ($userManager->requeteAll() as $users) {

        if ($email === $users->email && (sha1($password) === $users->password)) {

            $_SESSION['user_id'] = $users->id;

            $requete = $base_de_donnee->prepare('UPDATE user SET last_login = CURRENT_TIME WHERE email = :valeur');
            $requete->bindParam('valeur', $email);
            $requete->execute();

            header('Location: http://localhost:8080/dashboard');
            exit();
        }
    }
}
else {
    $error_message = "Le mot de passe doit contenir au moins 8 caractères";
}

?>

<main>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 login">
                <form method="post">
                    <img src="/view/assets/img/locked.svg" alt="" class="lockpad col-12">
                    <div class="form-group col-11">
                        <?php if( !empty($error_message)) { ?>
                            <div class="alert alert-danger">
                                <?=$error_message?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-11">
                        <input type="email"
                               class="form-control"
                               name="email"
                               id="exampleInputEmail1"
                               placeholder="Email"
                               value="<?=$email?>"
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <input type="password"
                               class="form-control"
                               name="password"
                               id="exampleInputPassword1"
                               placeholder="Password"
                               value="<?=$password?>"
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <button type="submit" class="btn col-12 font-weight-bold">LOGIN</button>
                        <a class="form-text text-muted col-12" href="">Email ou Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>