
<?php

if (isset($_POST['profil_envoyer'])) {

    foreach ($userManager->requeteAll() as $users) {

        if ($USER->id === $users->id) {

            $requete = $base_de_donnee->prepare('UPDATE user SET email = :email, password = :password, updated_at = CURRENT_TIME WHERE id = :id');
            $requete->bindParam('id', $USER->id);
            $requete->bindParam('email', $_POST['nouvelle_adresse_mail']);
            $requete->bindParam('password', sha1($_POST['nouveau_mot_de_passe']));
            $requete->execute();

            echo "Adresse mail et mote de passe à jour";
        }
    }
}

?>

<main>
    <section class="container">
        <div class="row">
            <form method="post" class="col-8 formulaire_profil">
                <h1>Editer votre profil</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nouvelle adresse email :</label>
                    <input type="email" name="nouvelle_adresse_mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nouveau mot de passe :</label>
                    <input type="password" name="nouveau_mot_de_passe" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" name="profil_envoyer">ENVOYER</button>
            </form>
        </div>
    </section>
</main>