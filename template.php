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

<?php @include_once "views/module/nav.php"; ?>

<body>
<?php

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

?>

</body>

<?php @include_once "views/module/footer.php" ?>

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