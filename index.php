<?php

$requested_url = $_SERVER['PATH_INFO'];

if (!$requested_url) {
    $requested_url = '/';
}

//init
require 'config/routes.php';
require 'tools/Logger.php';

$logger = new Logger();

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

//try {
//    if ($requested_url === '/auth/login') {
//
//        require 'controller/auth/login.php';
//    }
//    else {
//        throw new Exception("Page not found");
//    }
//}
//catch (Exception $ex) {
//    die($ex->getMessage());
//}