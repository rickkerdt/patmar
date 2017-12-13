<?php

$errors = [];

if (isset($_POST["login"])) {

    $user = new User();
    if ($user->login($_POST["email"], $_POST["password"])) {
        header("Location: /dashboard/");
    } else {
        $errors = $user->errorList;
    }
}

if (isset($_POST["contactsend"])) {
    $contact = new Contact();
    $sent = false;

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
        if ($_POST["g-recaptcha-response"] != '') {
            if ($contact->sendform($_POST["email"], $_POST["naam"], $_POST['adres'], $_POST['telefoonnumer'], $_POST['woonplaats'], $_POST['bericht'])) {
                $sent = true;
            } else {
                $errors = $contact->errorList;
            }
        } else {
            array_push($errors, "Los de recaptcha a.u.b. op.");
        }
    } else {
        array_push($errors, "Los de recaptcha a.u.b. op.");
    }
}

if (isset($_POST["register"])) {

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
        if ($_POST["g-recaptcha-response"] != '') {
            $user = new User();
            if ($user->register($_POST["email"], $_POST["password"], $_POST["passwordrepeat"], $_POST["firstname"], $_POST["lastname"])) {
                header("Location: /index.php?page=login");
                die();
            } else {
                $errors = $user->errorList;
            }

        } else {
            array_push($errors, "Los de recaptcha a.u.b. op.");
        }
    } else {
        array_push($errors, "Los de recaptcha a.u.b. op.");
    }
}

