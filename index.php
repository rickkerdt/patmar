<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

function __autoload($class_name) {
    include "classes/" . $class_name . '.php';
}

foreach (glob("routes/*.php") as $filename)
{
    include_once $filename;
}

include_once "template.php";