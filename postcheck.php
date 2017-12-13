<?php

//Lijst met errors
$errors = [];
//Login form
//checkt of de login formulier is ontvangen
if (isset($_POST["login"])) {

    //Maakt een nieuwe instantie van de classe User aan
    $user = new User();

    //Log de gebruiker in
    if ($user->login($_POST["email"], $_POST["password"])) {
        //Verwijzen naar dashboard pagina
        header("Location: /dashboard/");
    } else {
        //Error lijst ophalen
        $errors = $user->errorList;
    }
}

//Checkt of contact formulier is verstuurd
//Contact form
if (isset($_POST["contactsend"])) {
    //Nieuwe instantie van contact aanmaken
    $contact = new Contact();
    //boolean waarde voor of het verzonden is
    $sent = false;

    //Url voor Google ReCaptcha api
    $url = "https://www.google.com/recaptcha/api/siteverify";

    //Data wat er verstuurd moest worden
    $data = [
        "secret" => "6LdLDzwUAAAAAFjh7PJWnBXmxKTs87I03ZSCMwV8",
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER['REMOTE_ADDR']
    ];

    //Opties voor de http request
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    //Context voor stream aanmaken
    $context = stream_context_create($options);
    //Resultaat ophalen van de url
    $result = file_get_contents($url, false, $context);

    //Kijkt of het succesvol is
    if ($result["success"] == true) {

        //Kijkt of er response is
        if ($_POST["g-recaptcha-response"] != '') {
            if ($contact->sendform($_POST["email"], $_POST["naam"], $_POST['adres'], $_POST['telefoonnummer'], $_POST['woonplaats'], $_POST['bericht'])) {
                //Contact formulier versturen naar back-end
                if ($contact->sendform($_POST["email"], $_POST["naam"], $_POST['adres'], $_POST['telefoonnummer'], $_POST['woonplaats'], $_POST['bericht'])) {
                    $sent = true;
                    header("Location: ?page=index");
                } else {
                    //  Errors in een lijst neer zetten
                    $errors = $contact->errorList;
                }
            } else {
                //Error toevoegen aan lijst
                array_push($errors, "Los de recaptcha a.u.b. op.");
            }
        } else {
            //Error toevoegen aan lijst
            array_push($errors, "Los de recaptcha a.u.b. op.");
        }
    }
}

//Kijkt of register formulier is verstuurd
//Register form
if (isset($_POST["register"])) {

    //Google ReCaptcha API url
    $url = "https://www.google.com/recaptcha/api/siteverify";

    //Gegevens voor ReCaptcha API
    $data = [
        "secret" => "6LdLDzwUAAAAAFjh7PJWnBXmxKTs87I03ZSCMwV8",
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER['REMOTE_ADDR']
    ];


    //HTTP opties
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


