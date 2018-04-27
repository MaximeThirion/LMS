
<?php

foreach ($userManager->requeteAll() as $users) {

    if ($_POST['email'] === $users->email && $_POST['secret_question'] === $users->secret_question) {

        $_SESSION['user_id'] = $users->id;

        $requete = $base_de_donnee->prepare('UPDATE user SET password = :password, updated_at = CURRENT_TIME WHERE email = :email');
        $requete->bindParam('password', sha1($_POST['new_password']));
        $requete->bindParam('email', $_POST['email']);
        $requete->execute();

        $message = '<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">Les informations ont été mise a jour !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
    }
}

?>

<main>
    <?= $message ?>
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
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <input type="text"
                               class="form-control"
                               name="secret_question"
                               id="exampleSecret_question1"
                               placeholder="Question secrète"
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <input type="password"
                               class="form-control"
                               name="new_password"
                               id="exampleInputPassword3"
                               placeholder="Nouveau mot de passe"
                               value=""
                               autocomplete="off">
                    </div>
                    <div class="form-group col-11">
                        <button type="submit" id="envoyer_forgot_password" class="btn col-12 font-weight-bold">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>