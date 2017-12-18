<!-- wanneer een gebruiker is ingelogt wordt hij naar de "?page=home" gestuurd-->
<?php
if ($_SESSION["loggedIn"])
    echo "
<script>
    window.location.replace(\"?page=home\");
</script>";
?>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Registreren</h1>
            <form action="?page=register" method="post">
                <div class="row">
                    <!-- Error melding als er een error op komt -->
                    <?php if (count($errors) > 0) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-warning">
                                <strong>Fout!</strong> <?php echo $error; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- HTML form -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@mail.nl">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">

                            <label for="firstname">Voornaam</label>
                            <input required type="text" class="form-control" name="firstname" id="firstname" placeholder="Jan">
                        </div>
                        <div class="col-md-6">

                            <label for="lastname">Achternaam</label>
                            <input required type="text" class="form-control" name="lastname" id="lastname"
                                   placeholder="de Vries">
                        </div>
                    </div>
                    <!--                </div>-->
                    <!--                <div class="form-group">-->
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input required type="password" class="form-control" name="password" id="password" placeholder="********">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord herhalen</label>
                    <input required type="password" class="form-control" name="passwordrepeat" id="passwordrepeat"
                           placeholder="********">
                </div>
                <div class="form-group">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>
                </div>
                <div class="form-group">
                    <input required type="submit" class="form-control btn btn-primary" name="register" value="Registreren">
                </div>
                <!-- Login button -->
                <div class="form-group">
                    <span>Al een account?</span>
                    <a href="/index.php?page=login" class="btn-link">Login</a>
                </div>
            </form>
        </div>
        <div class="col">&nbsp;</div>
    </div>
</div>