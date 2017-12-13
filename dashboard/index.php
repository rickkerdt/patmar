<?php
//Start de sessie
session_start();

//Is alleen toegankelijk als je ingelogd bent
if (!isset($_SESSION["loggedIn"])) {
    header("Location: /index.php?page=login");
}

//Automatisch inladen van classes
function __autoload($class_name)
{
    include "../classes/" . $class_name . '.php';
}

//Pagina template inladen
include_once "template.php";