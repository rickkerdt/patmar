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
//wanneer de velden gecheked zijn wordt er een mail aangemaakt met de inhoud van de ingevulde velden.
            $to = "admin@patmar.com";
            $subject = "Contact";
            $message = $bericht;
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: admin@patmar.win' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
//Database entry voor dezelfde gegevens:
//          Verbinding maken met database
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
//          Query voor het invoegen van gebruiker
            $q = $db->prepare("INSERT INTO User(Email, Naam, Woonplaats, Telefoonnummer, Bericht) VALUES (?, ?, ?, ?, ?)");

//          Anti SQL Injectie
            $q->bindValue(1, $this->$email);
            $q->bindValue(2, $this->$naam);
            $q->bindValue(3, $this->$woonplaats);
            $q->bindValue(4, $this->$telefoonnummer);
            $q->bindValue(5, $this->$bericht);

//          Query uitvoeren
            $q->execute();
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
