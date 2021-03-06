<?php if ($_SESSION["permission"] != "1") : ?>
    <div class='alert alert-danger'><strong>Fout!</strong> Niet toegestaan!</div>
<?php elseif ($_SESSION["permission"] == "1"):

    $users = new Account();

    if (isset($_POST["saveUserChanges"])) {
        if (isset($_POST["password"]) && $_POST["password"] != "") {
            if ($_POST["password"] == $_POST["passwordrepeat"]) {
                if ($users->updatePassword($_POST["password"])) {
                    echo "<div class='alert alert-success'><strong>Gelukt!</strong> Gegevens zijn aangepast.</div>";
                } else {
                    foreach ($users->errorList as $error) {
                        echo "<div class='alert alert-danger'><strong>Fout!</strong> " . $error . "</div>";
                    }
                }
                $users->updateInfo($_GET["userID"] ,$_POST["city"], $_POST["streetName"], $_POST["houseNumber"], $_POST["addition"], $_POST["zipcode"], $_POST["phoneNumber"]);
            } else {
                echo "<div class='alert alert-danger'><strong>Fout!</strong> Het wachtwoord komt niet met elkaar overeen.</div>";
            }
        } else {
            $users->updateInfo($_GET["userID"] ,$_POST["city"], $_POST["streetName"], $_POST["houseNumber"], $_POST["addition"], $_POST["zipcode"], $_POST["phoneNumber"]);
        }
    }

    $user = $users->getUser($_GET["userID"]);
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
            <div class="row">
                <div class="col-md-6">

                    <label for="street">Straat</label>
                    <input required type="text" class="form-control" name="streetName" id="street"
                           placeholder="Vogelenstraat" value="<?php echo $user["StreetName"]; ?>">
                </div>
                <div class="col-md-3">
                    <label for="housenumber">Huis nummer</label>
                    <input required type="text" class="form-control" name="houseNumber" id="housenumber"
                           placeholder="7" value="<?php echo $user["HouseNumber"]; ?>">
                </div>
                <div class="col-md-3">

                    <label for="addition">Toevoeging</label>
                    <input type="text" class="form-control" name="addition" id="addition"
                           placeholder="B" value="<?php echo $user["Addition"]; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <label for="city">Plaats</label>
                    <input required type="text" class="form-control" name="city" id="city" placeholder="Zwolle" value="<?php echo $user["City"]; ?>">
                </div>
                <div class="col-md-4">
                    <label for="zipcode">Postcode</label>
                    <input required type="text" class="form-control" name="zipcode" id="zipcode"
                           placeholder="7777ZZ" value="<?php echo $user["ZipCode"]; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Telefoonnummer</label>
            <input required type="tel" class="form-control" name="phoneNumber" id="phoneNumber"
                   placeholder="0612345678" value="<?php echo $user["PhoneNumber"]; ?>">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="******"
                   aria-describedby="emailHelp">
            <small id="passwordHelp" class="form-text text-muted">Alleen invullen als je wachtwoord wilt wijzigen.
            </small>
        </div>
        <div class="form-group">
            <label for="passwordrepeat">Wachtwoord herhalen</label>
            <input type="password" class="form-control" id="passwordrepeat" name="passwordrepeat"
                   placeholder="******">
        </div>
        <div class="form-group">
            <input type="submit" name="saveUserChanges" value="Opslaan" class="btn btn-outline-primary">
        </div>
    </form>

<?php endif; ?>