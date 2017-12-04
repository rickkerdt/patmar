<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 30-11-2017
 * Time: 13:54
 */

class Contact
{
    public $errorList = [];

    //cheken of de benodigde velden niet leeg zijn.
    public function sendform($email, $name, $adres, $telefoonnumer, $woonplaats, $bericht)
    {
        if ($this->checkForm($email, $telefoonnumer)) {

            $to = "admin@patmar.com";
            $subject = "Contact";
            $message = $bericht;
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: admin@patmar.win' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            return true;
        } else {
            return false;
        }
    }

    private function checkForm($email, $telefoonnumer)
    {

        $valid = true;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorList, "De email adres klopt niet.");
            $valid = false;
        }

//        if (!preg_match('@[0-9]@', $telefoonnumer)) {
//            array_push($this->errorList, "Het telefoonnummer klopt niet.");
//            $valid = false;
//        }

        if ($valid) {
            return true;
        }
        return false;
    }
}


