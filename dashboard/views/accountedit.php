<?php if ($_SESSION["permission"] != "1") : ?>
    <div class='alert alert-danger'><strong>Fout!</strong> Niet toegestaan!</div>
<?php elseif ($_SESSION["permission"] == "1"):

    $users = new Account();
    $user = $users->getUser($_GET["userID"]);

    if (isset($_POST["saveUserChanges"])) {
        if (isset($_POST["password"])) {
            if ($_POST["password"] == $_POST["passwordrepeat"]) {
                if ($users->updatePassword($_POST["password"])) {
                    echo "<div class='alert alert-success'><strong>Gelukt!</strong> Gegevens zijn aangepast.</div>";
                } else {
                    foreach ($users->errorList as $error) {
                        echo "<div class='alert alert-danger'><strong>Fout!</strong> " . $error . "</div>";
                    }
                }
            } else {
                echo "<div class='alert alert-danger'><strong>Fout!</strong> Het wachtwoord komt niet met elkaar overeen.</div>";
            }
        }
    }
    ?>

    <form action="/dashboard/?page=accountedit&userID=<?php echo $_GET["userID"] ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" class="form-control" id="name" placeholder="Naam" name="name" disabled
                           value="<?php echo $user["FirstName"]; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Achternaam</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Achternaam" name="lastname"
                           disabled value="<?php echo $user["LastName"]; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email-adres</label>
            <input type="email" class="form-control" id="email"
                   placeholder="Enter email" name="email" disabled value="<?php echo $user["Email"]; ?>">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                   aria-describedby="emailHelp">
            <small id="passwordHelp" class="form-text text-muted">Alleen invullen als je wachtwoord wilt wijzigen.
            </small>
        </div>
        <div class="form-group">
            <label for="passwordrepeat">Wachtwoord herhalen</label>
            <input type="password" class="form-control" id="passwordrepeat" name="passwordrepeat"
                   placeholder="Password">
        </div>
        <div class="form-group">
            <input type="submit" name="saveUserChanges" value="Opslaan" class="btn btn-outline-primary">
        </div>
    </form>

<?php endif; ?>