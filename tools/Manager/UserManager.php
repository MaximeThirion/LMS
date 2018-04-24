<?php

namespace LMS;

class UserManager {

    public $bdd;

    public function setBDD($bdd) {

        $this->bdd = $bdd;
    }

    public function requeteAll() {

        $requete = $this->bdd->query('SELECT id, email, password, lastname, firstname, secret_question, last_login, created_at, updated_at FROM `user`');
        $resultat = $requete->fetchAll(\PDO::FETCH_CLASS, 'LMS\User');
        $requete->closeCursor();
        return $resultat;
    }
}