<?php
if ($_SESSION["loggedIn"])
    header("Location: /index.php?page=home");

$errors = [];

if (isset($_POST["login"])) {
    if (!isset($_SESSION["wrongpassword"])) {
        $_SESSION["wrongpassword"] = 0;
    }
    if (isset($_SESSION["wrongpassword"]) && $_SESSION["wrongpassword"] < 5 && !isset($_SESSION["LAST_ACTIVITY"])) {

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            "secret" => "6LdLDzwUAAAAAFjh7PJWnBXmxKTs87I03ZSCMwV8",
            "response" => $_POST["g-recaptcha-response"],
            "remoteip" => $_SERVER['REMOTE_ADDR']
        ];

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);


//    if ($result["success"] == true) {
//        if ($_POST["g-recaptcha-response"] != '') {
        $user = new User();
        if ($user->login($_POST["email"], $_POST["password"])) {
            header("Location: /index.php?page=home");
        } else {
            $errors = $user->errorList;
            if (!isset($_SESSION["worngpassword"])) {
                $_SESSION["wrongpassword"] = 1;
            } else {

                $_SESSION["wrongpassword"] = $_SESSION["wrongpassword"] + 1;
            }
        }
//        } else {
//            array_push($errors, "Los de recaptcha a.u.b. op.");
//        }
//    } else {
//        array_push($errors, "Los de recaptcha a.u.b. op.");
//    }
    } else {
        array_push($errors, "U heeft te vaak verkeerde wachtwoord ingevoerd.");

        $time = $_SERVER['REQUEST_TIME'];

        /**
         * for a 30 minute timeout, specified in seconds
         */
        $timeout_duration = 1800;

        /**
         * Here we look for the user's LAST_ACTIVITY timestamp. If
         * it's set and indicates our $timeout_duration has passed,
         * blow away any previous $_SESSION data and start a new one.
         */
        if (isset($_SESSION['LAST_ACTIVITY']) &&
            ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
            session_unset();
            session_destroy();
            session_start();
        }

        /**
         * Finally, update LAST_ACTIVITY so that our timeout
         * is based on it and not the user's login time.
         */
        $_SESSION['LAST_ACTIVITY'] = $time;
    }
}

?>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Login</h1>
            <form action="?page=login" method="post">
                <div class="row">
                    <?php if (count($errors) > 0) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-warning">
                                <strong>Fout!</strong> <?php echo $error; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@mail.nl">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="********">
                </div>
                <!--                <div class="form-group">-->
                <!--                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
                <!--                    <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>-->
                <!--                </div>-->
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="login" value="Login">
                </div>
                <div class="form-group">
                    <span>Geen account?</span>
                    <a href="?page=register" class="btn-link">Registreren</a>
                </div>
            </form>
        </div>
        <div class="col">&nbsp;</div>
    </div>
</div>