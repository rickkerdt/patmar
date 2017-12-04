<?php
$_SESSION = null;
$_SESSION["loggedIn"] = null;
die(header("Location: /index.php?page=login"));