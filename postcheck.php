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
        header("Location: /dashboard/?page=home");
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
    //boolean waarde om te controleren of het verzonden is
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
            //Contact formulier versturen naar back-end
            if ($contact->sendform($_POST["email"], $_POST["naam"], $_POST['adres'], $_POST['telefoonnummer'], $_POST['woonplaats'], $_POST['bericht'])) {
                $_SESSION["sent"] = true;
                header("Location: ?page=contact");
                die();
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


//Kijkt of Storing formulier is verstuurd
//Storing form
if (isset($_POST["storingsend"])) {
    //Nieuwe instantie van contact aanmaken
    $storing = new Storing();
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
            //Contact formulier versturen naar back-end
            if ($storing->sendform($_POST["categorie"], $_POST["bericht"])) {
                $_SESSION["sent"] = true;
                header("Location: /dashboard/?page=storing_melden");
                die();
            } else {
                //  Errors in een lijst neer zetten
                $errors = $storing->errorList;
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


//Kijkt of offerte formulier is verstuurd
//Offerte form
if (isset($_POST["offertesend"])) {

    if (isset($_FILES['bestand'])) {
        print_r($_FILES);
        $errors = array();
        $file_name = $_FILES['bestand']['name'];
        $file_size = $_FILES['bestand']['size'];
        $file_tmp = $_FILES['bestand']['tmp_name'];
        $file_type = $_FILES['bestand']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['bestand']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            array_push($errors, "Kies altublieft een JPEG of PNG bestand.");
        }

        if ($file_size > 5097152) {
            array_push($errors, 'Het bestand mag maximaal 4 MB groot zijn');
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    //Nieuwe instantie van contact aanmaken
    $offerte = new Offerte();
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
            //Contact formulier versturen naar back-end
            if ($offerte->sendform($_POST["email"], $_POST["naam"], $_POST['adres'], $_POST['telefoonnummer'], $_POST['woonplaats'], $_POST['bericht'], $_POST['categorie'])) {
                $_SESSION["sent"] = true;
                header("Location: ?page=offerte");
                die();
            } else {
                //  Errors in een lijst neer zetten
                $errors = $offerte->errorList;
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
            if ($user->register($_POST["email"], $_POST["password"], $_POST["passwordrepeat"], $_POST["firstname"], $_POST["lastname"], $_POST["phoneNumber"], $_POST["city"], $_POST["streetName"], $_POST["houseNumber"], $_POST["addition"], $_POST["zipcode"])) {
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
?>

