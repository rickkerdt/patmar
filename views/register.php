<?php
if ($_SESSION["loggedIn"])
    header("Location: /index.php?page=home");

$errors = [];

if (isset($_POST["register"])) {
    $user = new User();
    if ($user->register($_POST["email"], $_POST["password"], $_POST["passwordrepeat"], $_POST["firstname"], $_POST["lastname"])) {
        header("Location: /index.php?page=login");
    } else {
        $errors = $user->errorList;
    }
}

?>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Registreren</h1>
            <form action="?page=register" method="post">
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
                    <!--                </div>-->
                    <!--                <div class="form-group">-->
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="********">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord herhalen</label>
                    <input type="password" class="form-control" name="passwordrepeat" id="passwordrepeat"
                           placeholder="********">
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>
                    <br/>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="register" value="Registreren">
                </div>
                <div class="form-group">
                    <span>Al een account?</span>
                    <a href="/index.php?page=login" class="btn-link">Login</a>
                </div>
            </form>
        </div>
        <div class="col">&nbsp;</div>
    </div>
</div>