/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 28-11-2017
 * Time: 10:13
 */
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patmar Zonweringen</title>
    <link rel="stylesheet" href="/resource/css/bootstrap.css">
    <link rel="stylesheet" href="/resource/css/custom.css">
    <!--<script src="..\resource\js\bootstrap.js"></html>-->
</head>
<header>
    <!-- Image and text -->

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top navbar-custom mx-auto" style=" background-color: #00769f;">
        <div class="d-lg-none d-xl-none navbar-brand">A5 Deco - Patmar</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01" >
            <a class="navbar-left col" href="#">
                <div class=" d-none d-lg-block d-xl-block">
                <img src="/resource/assets/logo.png" height="128" width="128" style="padding-top: 0px; position: absolute; border-radius: 35%" class="d-block" alt="1">
                </div>
            </a>
            <ul class="navbar-nav mx-auto w-100 justify-content-center" >
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Openingstijden</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Samenwerking
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Partners</a>
                </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Storing Melden</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Offerte Aanvraag <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="?page=login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>
<section id="maincontent" class="clearfix ">
    <div class="container">
        <div id="headertitle"><h2><span>Contactpagina</span></h2></div>
    </div>
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Contact</h1>
            <form action="?page=register" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@mail.nl">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">

                            <label for="firstname">Voornaam</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Jan">
                        </div>
                        <div class="col-md-6">

                            <label for="lastname">Achternaam</label>
                            <input type="text" class="form-control" name="lastname" id="lastname"
                                   placeholder="de Vries">
                        </div>
                    </div>
</body>
</html>
