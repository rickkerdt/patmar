<?php
$users = new Account();
$user = $users->getUser($_GET["userID"]);
?>

<form action="/dashboard/?page=accountedit">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" placeholder="Naam" name="name" disabled value="<?php echo $user["FirstName"]; ?>">
            </div></div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastname">Achternaam</label>
                <input type="text" class="form-control" id="lastname" placeholder="Achternaam" name="lastname" disabled value="<?php echo $user["LastName"]; ?>">
            </div></div>
    </div>
    <div class="form-group">
        <label for="email">Email-adres</label>
        <input type="email" class="form-control" id="email"
               placeholder="Enter email" name="email" disabled value="<?php echo $user["Email"]; ?>">
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password"  aria-describedby="emailHelp">
        <small id="passwordHelp" class="form-text text-muted">Alleen invullen als je wachtwoord wilt wijzigen.</small>
    </div>
    <div class="form-group">
        <label for="passwordrepeat">Wachtwoord herhalen</label>
        <input type="password" class="form-control" id="passwordrepeat" name="passwordrepeat" placeholder="Password">
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
