<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time: 09:41
 */

class Offerte
{
    public $errorList = [];

    //cheken of de benodigde velden niet leeg zijn.
    public function sendform($email, $naam, $telefoonnumer, $woonplaats, $bericht)
    {
        if ($this->checkForm($email, $telefoonnumer,$naam,$woonplaats,$bericht)) {
        //wanneer de velden gecheked zijn wordt er een mail aangemaakt met de inhoud van de ingevulde velden.
            $to = "admin@patmar.com";
            $subject = "Offerte";
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

    private function checkForm($email,$naam,$woonplaats,$telefoonnumer, $bericht)
    {
        //Errors die gegeven worden  als er velden leeg zijn of niet zijn ingevuld.
        $valid = true;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorList, "Het emailadres is niet of niet correct ingevuld.");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z]@',$naam)) {
            array_push($this->errorList, "Uw naam is niet of niet correct ingevuld.");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z]@',$woonplaats)) {
            array_push($this->errorList, "Uw woonplaats is niet ingevuld.");
            $valid = false;
        }
        if (!preg_match('@[0-9]@', $telefoonnumer)) {
            array_push($this->errorList, "Uw telefoonnummer is niet of niet correct ingevuld");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z0-9]@',$bericht)) {
            array_push($this->errorList, "Het berichtveld moet een bericht bevatten.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
        return false;
    }
}