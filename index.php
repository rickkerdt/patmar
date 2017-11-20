<?php

function __autoload($class_name) {
    include "classes/" . $class_name . '.php';
}

if (isset($_GET["page"]) && $_GET["page"] != "") {
    if (file_exists("views/" . $_GET["page"] . ".php")) {
        @include_once "views/" . $_GET["page"] . ".php";
    } elseif ($_GET["page"] == "home") {
        @include_once "views/index.php";
    } else {
        @include_once "views/errors/404.php";
    }

} else {
    @include_once "views/index.php";
}