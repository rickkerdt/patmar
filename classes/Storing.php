<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time: 09:41
 */

class Storing
{
    public $errorList = [];
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    //checken of de benodigde velden niet leeg zijn.
    public function sendform($categorie, $bericht)
    {


        $qu = $this->db->prepare("SELECT * FROM User WHERE UserID = ?");
        $qu->bindValue(1, $_SESSION['UserID']);

        if ($qu->execute()) {
            $userinfo = $qu->fetchAll();
        } else {
            return $qu->errorCode();
        }

        if ($this->checkForm($categorie, $bericht)) {
            //wanneer de velden gecheked zijn wordt er een mail aangemaakt met de inhoud van de ingevulde velden.
            $to = "admin@patmar.com";
            $subject = "Storing";
            $message = $bericht;
            $headers = 'From: ' . $userinfo['Email'] . "\r\n" .
                'Reply-To: admin@patmar.win' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            //Database entry voor dezelfde gegevens:

//          Verbinding maken met database
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
//          Query voor het invoegen van gebruiker
            $q = $db->prepare("INSERT INTO Storing(UserID, CategoryID, Explanation) VALUES (?, ?, ?)");
//          Anti SQL Injectie
            $q->bindValue(1, $userinfo['UserID']);
            $q->bindValue(2, $categorie);
            $q->bindValue(3, $bericht);

//          Query uitvoeren
            $q->execute();
            return true;
        } else {
            return false;
        }
    }

    private function checkForm($categorie, $bericht)
    {
        //Errors die gegeven worden  als er velden leeg zijn of niet zijn ingevuld.
        $valid = true;

        if (!preg_match('@[a-zA-Z0-9]@',$bericht)) {
            array_push($this->errorList, "Het berichtveld moet een bericht bevatten.");
            $valid = false;
        }
        if($categorie == "" || $categorie == 0){
            array_push($this->errorList, "Kies een categorie.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
        return false;
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