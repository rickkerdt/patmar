<?php

function __autoload($class_name)
{
    include "../classes/" . $class_name . '.php';
}

if (!isset($_SESSION["loggedIn"])) {
    header("Location: /index.php?page=login");
}

include_once "template.php";