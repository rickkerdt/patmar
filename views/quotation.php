/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 28-11-2017
 * Time: 10:13
 */
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-3 d-none d-lg-block d-xl-block float-left" style="padding-left: 4%;padding-bottom: 50px;">
            <div class="card">
                <div class="card-block" style="padding-left: 5px; border-color: #00769f ">
                    <h3 class="card-title"></h3>
                    <p class="card-text">
                    <h6 class="card-subtitle">A5 Patmar Marknesse</h6>
                    Hoge Sluiswal 47<br>
                    8316 AA Marknesse<br>
                    TEL: 0527 - 61 22 77<br>

                    <p>info@patmar.nl<br>
                        </p>

                    <br><h6 class="card-subtitle">A5 Patmar Meppel</h6>
                    Johan van Oldenbarneveltstraat 3<br>
                    7942  GZ  MEPPEL<br>
                    Tel. 0522 - 24 48 88<br>

                    <p>info@patmar.nl<br>
                        </p>
                    </p>
                    <a href="#" class="btn btn-primary">Route</a>

                </div>
            </div>
        </div>

        <div class="col d-none d-sm-block d-md-none"></div>
        <div class="col-md-6 jumbotron">
            <h1 class="text">Contact</h1>

            <br>
            <p>Heeft u vragen? &nbsp;<span style="line-height: 1.4;">Vul dan onderstaand formulier in.<br />
            Wij nemen dan zo spoedig mogelijk contact met u op.<br />
            Wilt u rechtstreeks contact dan kunt u ons bellen.</span></p>
            <br>

            <form action="?page=quotation" method="post">



                <div class="form-group">
                    <div class="row">
                        <div class="form-group">

                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="voorbeeld@mail.nl *">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">

                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Naam *">
                        </div>
                    </div>
                        <div class="row">
                        <div class="form-group">

                            <input type="text" class="form-control" name="adres" id="adres"
                                   placeholder="Adres">
                        </div>
                        </div>
                            <div class="row">
                        <div class="form-group">

                            <input type="text" class="form-control" name="woonplaats" id="woonplaats"
                                   placeholder="Woonplaats *">
                        </div>
                            </div>
                                <div class="row">
                        <div class="form-group">

                            <input cols="40" type="text" class="form-control" name="Telefoonnummer" id="Telefoonnummer"
                                   placeholder="Telefoonnummer *">
                        </div>
                                </div>
                                    <div class="row">

                        <div class="form-group">

                            <textarea rows="4" cols="40" class="form-control" name="Bericht" id="Bericht"
                                      placeholder="Bericht *"></textarea>
                        </div>
                                    </div>
                                        <div class="row">
                        <div class="form-group">
                            <input type="submit" value="Versturen">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col d-none d-sm-block d-md-none">&nbsp;</div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</html>