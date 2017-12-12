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
    public function sendform($email, $naam, $telefoonnumer, $woonplaats, $bericht)
    {
        if ($this->checkForm($email, $telefoonnumer,$naam,$woonplaats,$bericht)) {

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

    private function checkForm($email,$naam,$woonplaats,$telefoonnumer, $bericht)
    {

        $valid = true;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorList, "Het email adres klopt niet.");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z]@',$naam)) {
            array_push($this->errorList, "U moet uw naam nog invullen.");
            $valid = false;
      }
        if (!preg_match('@[a-zA-Z]@',$woonplaats)) {
             array_push($this->errorList, "Woonplaats invullen is verplicht.");
         $valid = false;
        }
        if (!preg_match('@[0-9]@', $telefoonnumer)) {
            array_push($this->errorList, "Er moet een telefoon nummer ingevuld worden.");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z0-9]@',$bericht)) {
            array_push($this->errorList, "U moet een bericht invullen.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
            return false;
    }
}
