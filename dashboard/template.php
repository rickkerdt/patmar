<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
</head>

<?php include_once "views/modules/nav.php"; ?>
<body>
<div class="row">
    <div class="col-md-2" style="padding: 50px 0 75px 0; background-color: #212529;">
        <div class="dashboard-side-button active"><a href="#">Overzicht</a></div>
        <div class="dashboard-side-button"><a href="#">Accounts</a></div>
        <div class="dashboard-side-button"><a href="#">Offertes</a></div>
        <div class="dashboard-side-button"><a href="#">Site Beheer</a></div>
        <div class="dashboard-side-button"><a href="#">Storingen</a></div>
    </div>
    <div class="col">
        <div class="jumbotron">
            <h1>test</h1>
        </div>
    </div>
</div>
<style>
    .dashboard-side-button {
        width: inherit;
        height: 50px;
        line-height: 50px;
        text-align: center;
        background-color: #2e3133;
    }

    .dashboard-side-button:hover {
        background-color: #1b1e21;
    }

    .dashboard-side-button:hover > a {
        color: white;
        text-decoration: none;
    }

    .dashboard-side-button a {
        width: inherit;
        height: inherit;
        padding: 20px 60px;
        color: grey;
    }

    .active {
        background-color: #0c5460;
    }

    .active a {
        color: white;
    }
</style>
<?php

if (isset($_GET["page"]) && $_GET["page"] != "") {
    if (file_exists("views/" . $_GET["page"] . ".php")) {
        @include_once "views/" . $_GET["page"] . ".php";
    } elseif ($_GET["page"] == "home") {
        @include_once "views/index.php";
    } else {
        @include_once "../views/errors/404.php";
    }

} else {
    @include_once "views/index.php";
}

?>
</body>
<?php include_once "views/modules/footer.php"; ?>
</html>