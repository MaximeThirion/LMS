
<?php

$email = array_key_exists('email', $_POST) ? $_POST['email'] : '';
$new_password = array_key_exists('new_password', $_POST) ? $_POST['new_password'] : '';

foreach ($userManager->requeteAll() as $users) {

    if ($email === $users->email) {

        $_SESSION['user_id'] = $users->id;

        $requete = $base_de_donnee->prepare('UPDATE user SET password = :password, updated_at = CURRENT_TIME WHERE email = :email');
        $requete->bindParam('password', sha1($new_password));
        $requete->bindParam('email', $email);
        $requete->execute();

        echo "Mot de passe réinitialiser";
    }
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
                               name="new_password"
                               id="exampleInputPassword2"
                               placeholder="Nouveau mot de passe"
                               value=""
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <button type="submit" id="envoyer_formulaire" class="btn col-12 font-weight-bold">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>