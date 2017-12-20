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
    public function sendform($email, $naam, $adres, $telefoonnummer, $woonplaats, $bericht, $categorie)
    {
        if ($this->checkForm($email, $naam, $adres, $woonplaats, $telefoonnummer, $bericht, $categorie)) {
//wanneer de velden gecheked zijn wordt er een mail aangemaakt met de inhoud van de ingevulde velden.
            $to = "admin@patmar.com";
            $subject = "Offerteaanvraag";
            $message = $bericht;
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: admin@patmar.win' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
//Database entry voor dezelfde gegevens:

//          Verbinding maken met database
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
//          Query voor het invoegen van gebruiker
            $q = $db->prepare("INSERT INTO Offerte(CategoryID, Email, Naam, Adres, Woonplaats, Telefoonnummer, Bericht) VALUES (?, ?, ?, ?, ?, ?, ?)");
//          Anti SQL Injectie
            $q->bindValue(1, $categorie);
            $q->bindValue(2, $email);
            $q->bindValue(3, $naam);
            $q->bindValue(4, $adres);
            $q->bindValue(5, $woonplaats);
            $q->bindValue(6, $telefoonnummer);
            $q->bindValue(7, $bericht);

//          Query uitvoeren
            $q->execute();
            return true;
        } else {
            return false;
        }
    }

    private function checkForm($email,$naam, $adres, $woonplaats, $telefoonnummer, $bericht, $categorie)
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
        if (!preg_match('@[a-zA-Z0-9]@',$adres)) {
            array_push($this->errorList, "Uw adres is niet ingevuld.");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z]@',$woonplaats)) {
            array_push($this->errorList, "Uw woonplaats is niet ingevuld.");
            $valid = false;
        }
        if (!preg_match('@[0-9]@', $telefoonnummer)) {
            array_push($this->errorList, "Uw telefoonnummer is niet of niet correct ingevuld");
            $valid = false;
        }
        if (!preg_match('@[a-zA-Z0-9]@',$bericht)) {
            array_push($this->errorList, "Het berichtveld moet een bericht bevatten.");
            $valid = false;
        }
        if ($categorie == "" || $categorie == 0) {
            array_push($this->errorList, "Kies een categorie.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
        return false;
    }

    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    public function getCategoryList()
    {
        $q = $this->db->prepare("SELECT * FROM Category WHERE active = 1");

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }
}