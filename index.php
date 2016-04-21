<?php
    header("Access-Control-Allow-Origin: *");
    //define ("directorySeparator", DIRECTORY_SEPARATOR);
    require 'libs/FrontController.php';
    require 'libs/Request.php';
    FrontController::main (new Request);
?>
