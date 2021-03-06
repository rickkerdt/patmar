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
    private $db;

//    Salt om wachtwoord te hashen
    private $salt = "AJGEA";

//    Errors lijst om later op te halen
    public $errorList = [];

    public function __construct()
    {
//          Verbinding maken met database
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

//    Register functie
    public function register($email, $password, $repeatpassword, $firstname, $lastname, $phoneNumber, $city, $streetName, $houseNumber, $addition, $zipcode)
    {
//        Maakt hash aan met wachtwoord en salt(met salten worden er extra bit toegevoegt aan het wachtwoord)
        $this->passhash = hash("sha512", $password . $this->salt . strtolower($email));
//         Voegd email waarde aan het object
        $this->email = $email;
//      Valideer of alles in orde is met de gebruikers input
        if ($this->validate($this->email, $password, $repeatpassword)) {
//          Query voor het invoegen van gebruiker
            $q = $this->db->prepare("INSERT INTO User(Email, PassHash, FunctionID) VALUES (?, ?, 2)");

//          Anti SQL Injectie
            $q->bindValue(1, strtolower($this->email));
            $q->bindValue(2, $this->passhash);

//          Query uitvoeren
            if ($q->execute()) {

                $q->closeCursor();

                $q2 = $this->db->prepare("SELECT UserID FROM User WHERE Email = ?");
                $q2->bindValue(1, $email);
                $q2->execute();
                $q2r = $q2->fetchAll()[0];
                $q2->closeCursor();
                $db = null;
//              Verbinding afsluiten
                if ($this->insertInfo($q2r["UserID"], $firstname, $lastname)) {
                    if (
                    $this->insertContact($q2r["UserID"], $phoneNumber, $city, $streetName, $houseNumber, $addition, $zipcode)) {
                        return true;
                    } else {
                        return false;
                    }
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
        return false;
    }

    private function insertInfo($userID, $firstname, $lastname)
    {
//      Query opbouwen
        $q2 = $this->db->prepare('INSERT INTO Userinfo(UserID, FirstName, LastName, Function) VALUES (?,?,?,?)');
//      Anti SQL injectie
        $q2->bindValue(1, $userID, PDO::PARAM_INT);
        $q2->bindValue(2, htmlentities($firstname), PDO::PARAM_STR);
        $q2->bindValue(3, htmlentities($lastname), PDO::PARAM_STR);
        $q2->bindValue(4, "Klant", PDO::PARAM_STR);
//      Query uitvoeren
        if ($q2->execute()) {
            return true;
        } else {
            array_push($this->errorList, "Er is iets fout gegaan." . $q2->errorCode());
            return false;
        }
    }

    private function insertContact($userID, $phoneNumber, $city, $streetName, $houseNumber, $addition, $zipcode)
    {
        $q = $this->db->prepare("INSERT INTO Address(UserID, City, StreetName, HouseNumber, Addition, ZipCode, PhoneNumber) VALUES (?,?,?,?,?,?,?)");
        $q->bindValue(1, $userID);
        $q->bindValue(2, $city);
        $q->bindValue(3, $streetName);
        $q->bindValue(4, $houseNumber);
        $q->bindValue(5, $addition);
        $q->bindValue(6, $zipcode);
        $q->bindValue(7, $phoneNumber);

        if ($q->execute()) {
            return true;
        } else {
            array_push($this->errorList, "Er is iets fout gegaan." . $q->errorCode());
            return false;
        }
    }

//   Login functie
    public function login($email, $password)
    {
//   Wachtwoord hashen
        $this->passhash = hash("sha512", $password . $this->salt . strtolower($email));
        $this->email = strtolower($email);

//        Verbinding maken met database
        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

//        Query om te zoeken of er gebruiker is
        $q = $db->prepare("SELECT * FROM User u JOIN Userinfo i ON u.UserID = i.UserID WHERE u.Email = ? AND u.PassHash = ?");

//        Anti SQL injectie
        $q->bindValue(1, $this->email);
        $q->bindValue(2, $this->passhash);

//        Query uitvoeren
        if ($q->execute()) {
            if ($q->rowCount() > 0) {
                $user = $q->fetchAll()[0];

                $_SESSION["loggedIn"] = true;
                $_SESSION["email"] = $this->email;
                $_SESSION["permission"] = $user["FunctionID"];
                $_SESSION["UserID"] = $user["UserID"];
                $_SESSION["Name"] = $user["FirstName"] . " " . $user["LastName"];

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