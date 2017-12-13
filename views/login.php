<?php
if ($_SESSION["loggedIn"])
    header("Location: /index.php?page=home");

$errors = [];

if (isset($_POST["login"])) {

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


    if ($result["success"] == true) {
        $user = new User();
        if ($user->login($_POST["email"], $_POST["password"])) {
            header("Location: /index.php?page=home");
        } else {
            $errors = $user->errorList;
        }
    } else {
        array_push($errors, "Los de recaptcha a.u.b. op.");
    }
}

?>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Login</h1>
            <form action="/index.php?page=login" method="post">
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
                <div class="form-group">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>
                </div>
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