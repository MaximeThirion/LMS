<?php

try {

    $base_de_donnee = new PDO('mysql:host=localhost;dbname=lms;charset=utf8', 'root', 'formationsimplon');
    $base_de_donnee->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $ex) {
    die('Erreur : '.$ex->getMessage());
}