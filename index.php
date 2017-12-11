<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

function __autoload($class_name) {
    include "classes/" . $class_name . '.php';
}

include_once "template.php";