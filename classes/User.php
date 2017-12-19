<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/28/2017
 * Time: 11:51
 */

class User
{
//    Variabels instellen
    public $email;
    private $passhash;
    private $sessionToken;
    public $creationdate;

//    Salt om wachtwoord te hashen
    private $salt = "AJGEA";

//    Errors lijst om later op te halen
    public $errorList = [];

//    Register functie
    public function register($email, $password, $repeatpassword, $firstname, $lastname)
    {
//        Maakt hash aan met wachtwoord en salt(met salten worden er extra bit toegevoegt aan het wachtwoord)
        $this->passhash = hash("sha512", $password . $this->salt . $email);
//         Voegd email waarde aan het object
        $this->email = $email;
//      Valideer of alles in orde is met de gebruikers input
        if ($this->validate($this->email, $password, $repeatpassword)) {
//          Verbinding maken met database
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
//          Query voor het invoegen van gebruiker
            $q = $db->prepare("INSERT INTO User(Email, PassHash, FunctionID) VALUES (?, ?, 2)");

//          Anti SQL Injectie
            $q->bindValue(1, $this->email);
            $q->bindValue(2, $this->passhash);

//          Query uitvoeren
            if ($q->execute()) {

                $q2 = $db->prepare("SELECT UserID FROM User WHERE Email = ?");
                $q2->bindValue(1, $email);
                $q2->execute();
                $q2r = $q2->fetchAll()[0];
//              Verbinding afsluiten
                if ($this->insertInfo($q2r["UserID"], $firstname, $lastname)) {
                    return true;
                } else {
                    array_push($this->errorList, "Er is iets fout gegaan." . $q2->errorCode());
                }
            } else {
//              Fout toevoegen aan errorlist
                array_push($this->errorList, "Er is iets fout gegaan." . $q->errorCode());
                return false;
            }
        } else {
            return false;
        }
    }

    private function insertInfo($userID, $firstname, $lastname)
    {
//      Verbinding maken met database
        $dbs = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
//      Query opbouwen
        $q2 = $dbs->prepare("INSERT INTO Userinfo( UserInfoID, FirstName, LastName, UserID) VALUES (?,?,?,?)");
//      Anti SQL injectie
        $q2->bindValue(1, $userID);
        $q2->bindValue(4, $userID);
        $q2->bindValue(2, $firstname);
        $q2->bindValue(3, $lastname);
//      Query uitvoeren
        if ($q2->execute()) {
            return true;
        } else {
            array_push($this->errorList, "Er is iets fout gegaan." . $q2->errorCode());
            return false;
        }
    }

//   Login functie
    public function login($email, $password)
    {
//   Wachtwoord hashen
        $this->passhash = hash("sha512", $password . $this->salt . $email);
        $this->email = $email;

//        Verbinding maken met database
        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

//        Query om te zoeken of er gebruiker is
        $q = $db->prepare("SELECT * FROM User WHERE Email = ? AND PassHash = ?");

//        Anti SQL injectie
        $q->bindValue(1, $this->email);
        $q->bindValue(2, $this->passhash);

//        Query uitvoeren
        if ($q->execute()) {
            if ($q->rowCount() > 0) {
                $_SESSION["loggedIn"] = true;
                $_SESSION["email"] = $this->email;

                return true;
            } else {
                array_push($this->errorList, "Uw gebruikersnaam of wachtwoord is onjuist.");
                return false;
            }
        } else {
            array_push($this->errorList, "Er is iets fout gegaan.");
            return false;
        }
    }

//    Validatie functie
    public function validate($email, $password, $passwordRepeat)
    {
//        Regex om te valideren
        $valid = true;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $symbols = preg_match('@[!\@#$%&*?]@', $password);

//        Validatie proces of het wachtwoord voldoet aan de gestelde criteria
        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8 || !$symbols) {
            array_push($this->errorList, "Het wachtwoord moet een hoofdletter, kleine letter, cijfer en speciaalteken bevatten en minimaal 8 tekens lang zijn.");
            $valid = false;
        }

        if ($password != $passwordRepeat) {
            array_push($this->errorList, "De ingevulde wachtwoorden komen niet overeen.");
            $valid = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorList, "Het emailadres is niet of niet correct ingevuld.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
        return false;
    }
}