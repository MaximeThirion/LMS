
<?php

$email = array_key_exists('email', $_POST) ? $_POST['email'] : '';
$password = array_key_exists('password', $_POST) ? $_POST['password'] : '';

foreach ($userManager->requeteAll() as $users) {

    if ($email === $users->email && (sha1($password) === $users->password)) {

        $_SESSION['user_id'] = $users->id;

        $requete = $base_de_donnee->prepare('UPDATE user SET last_login = CURRENT_TIME WHERE email = :email');
        $requete->bindParam('email', $email);
        $requete->execute();

        header('Location: http://localhost:8080/dashboard');
        exit();
    }
}

if (isset($_POST['forgot_pass'])) {
    header('Location: http://localhost:8080/auth/forgot_password');
}

?>

<main>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 login">
                <form method="post">
                    <img src="/view/assets/img/locked.svg" alt="" class="lockpad col-12">
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
                               id="password_login"
                               placeholder="Password"
                               value="<?=$password?>"
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <button type="submit" id="envoyer_formulaire" class="btn col-12 font-weight-bold">LOGIN</button>
                        <a class="form-text text-muted col-12" name="forgot_pass" href="http://localhost:8080/auth/forgot_password">Email ou Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>