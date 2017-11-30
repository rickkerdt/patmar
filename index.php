<?php

session_start();

function __autoload($class_name) {
    include "classes/" . $class_name . '.php';
}

include_once "template.php";