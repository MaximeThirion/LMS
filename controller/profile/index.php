<?php

if (isset($_POST['profil_envoyer'])) {

    foreach ($userManager->requeteAll() as $users) {

        if ($USER->id === $users->id) {

            $requete = $base_de_donnee->prepare('UPDATE user SET email = :email, password = :password, firstname = :firstname, lastname = :lastname, updated_at = CURRENT_TIME WHERE id = :id');
            $requete->bindParam('id', $USER->id);
            $requete->bindParam('email', $_POST['nouvelle_adresse_mail']);
            $requete->bindParam('password', sha1($_POST['nouveau_mot_de_passe']));
            $requete->bindParam('firstname', $_POST['nouveau_prenom']);
            $requete->bindParam('lastname', $_POST['nouveau_nom']);
            $requete->execute();

            $message = '<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">Les informations ont été mise a jour !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
        }
    }
}

?>

<main>
    <?= $message ?>
    <section class="container">
        <div class="row">
            <form method="post" class="col-8 formulaire_profil">
                <h1 class="text-center">Editer votre profil</h1>
                <div class="formulaire_profil_section">
                    <div class="form-group">
                        <label>Adresse email : <strong><?= $USER->email ?></strong></label>
                        <div>
                            <label for="exampleInputEmail1">Nouvelle adresse email :</label>
                            <input type="email" name="nouvelle_adresse_mail" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Adresse email" value="<?= $USER->email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Nouveau mot de passe :</label>
                        <input type="password" name="nouveau_mot_de_passe" class="form-control"
                               id="exampleInputPassword2" placeholder="Mot de passe">
                        <div class="valid-feedback">
                            Valide.
                        </div>
                        <div class="invalid-feedback">
                            Saisissez votre mot de passe ou un nouveau mot de passe d'au moins 8 caractères.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Prenom : <strong><?= $USER->firstname ?></strong></label>
                    <div>
                        <label for="exampleInputPassword1">Nouveau prenom :</label>
                        <input type="text" name="nouveau_prenom" class="form-control" id="exampleInputPrenom1"
                               placeholder="Prenom" value="<?= $USER->firstname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nom : <strong><?= $USER->lastname ?></strong></label>
                    <div>
                        <label for="exampleInputPassword1">Nouveau nom :</label>
                        <input type="text" name="nouveau_nom" class="form-control" id="exampleInputNom1" placeholder="Nom"
                               value="<?= $USER->lastname ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="envoyer_formulaire_profil" name="profil_envoyer">MODIFIER MES INFORMATIONS</button>
            </form>
        </div>
    </section>
</main>