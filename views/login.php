<?php
if ($_SESSION["loggedIn"])
    echo "
<script>
    window.location.replace(\"?page=home\");
</script>";
?>
<!-- login pagina -->
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text-center">Login</h1>
            <form action="?page=login" method="post">
                <div class="row">
                    <!-- alerts wanneer velden niet goed zijn ingevuld -->
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