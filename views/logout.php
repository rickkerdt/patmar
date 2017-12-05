<?php
$_SESSION = null;
$_SESSION["loggedIn"] = null;
header("Location: /index.php?page=login");