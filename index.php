<?php

session_start();

$requested_url = $_SERVER['PATH_INFO'];

if (!$requested_url) {
    $requested_url = '/';
}

//init
require 'config/routes.php';
require 'tools/Logger.php';
require 'config/database.php';
include 'tools/Manager/UserManager.php';
include 'tools/Model/User.php';

use LMS\UserManager;

$userManager = new UserManager();
$userManager->setBDD($base_de_donnee);

$logger = new Logger();

foreach ($userManager->requeteAll() as $users) {

    if ($users->id === $_SESSION['user_id']) {

        $user = [
            "id" => $users->id,
            "email" => $users->email,
            "password" => $users->password,
            "lastname" => $users->lastname,
            "firstname" => $users->firstname,
            "secret_question" => $users->secret_question,
            "last_login" => $users->last_login,
            "created_at" => $users->created_at,
            "updated_at" => $users->updated_at
            ];
    }
}

//Est ce que la route existe ?
if (array_key_exists($requested_url, $routes_config)) {

    $logger->log("route found : ${requested_url}");
    //Si oui, je l'inclus
    $controller = $routes_config[$requested_url];

    //Est ce que le controller existe ?
    if (file_exists($controller)) {
        $logger->log("controller found : ${requested_url}");

        //inclusion du top su site
        require 'view/top.php';
        //inclusion du controller
        require $controller;
        //inclusion du bottom du site
        require 'view/bottom.php';
    }
    else {
        $logger->log("controller not found : ${requested_url}");
        require 'controller/error/404.php';
    }
}
else {
    $logger->log("controller not found : ${requested_url}");
    require 'controller/error/404.php';
}