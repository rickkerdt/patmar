<?php
$users = new Account();
$user = $users->getUser($_GET["userID"]);
?>

<form action="/dashboard/?page=accountedit">
    <div class="form-group">
        <label for="email">Email adres</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="Enter email" name="email" disabled value="<?php echo $user["Email"]; ?>">
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <small id="emailHelp" class="form-text text-muted">Alleen invullen als je wachtwoord wilt wijzigen.</small>
    </div>
    <div class="form-group">
        <label for="passwordrepeat">Wachtwoord herlalen</label>
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
