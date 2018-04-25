<?php

namespace LMS;

class User {

    public $id;
    public $email;
    public $password;
    public $lastname;
    public $firstname;
    public $secret_question;
    public $last_login;
    public $created_at;
    public $updated_at;

    public function getPresentation() {
        return $this->firstname." ".$this->lastname;
    }
}