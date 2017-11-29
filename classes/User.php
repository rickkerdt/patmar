<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/28/2017
 * Time: 11:51
 */

class User
{
    public $email;
    private $passhash;
    private $sessionToken;
    public $creationdate;

    private $salt = "AJGEA";

    public $errorList = [];

    public function register($email, $password, $repeatpassword)
    {
        $this->passhash = hash("sha512", $password . $this->salt . $email);

        $this->email = $email;

        if ($this->validate($this->email, $password, $repeatpassword)) {
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

            $q = $db->prepare("INSERT INTO user(Email, PassHash, FunctionID) VALUES (?, ?, 2)");

            $q->bindValue(1, $this->email);
            $q->bindValue(2, $this->passhash);

            if ($q->execute()) {
                return true;
            } else {
                array_push($this->errorList, "Er is iets fout gegaan.");
                return false;
            }
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->passhash = hash("sha512", $password . $this->salt . $email);
        $this->email = $email;

        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

        $q = $db->prepare("SELECT * FROM user WHERE Email = ? AND PassHash = ?");

        $q->bindValue(1, $this->email);
        $q->bindValue(2, $this->passhash);

        if ($q->execute()) {
            if ($q->rowCount() > 0) {
                $_SESSION["loggedIn"] = true;
                $_SESSION["email"] = $q->fetchAll()[0]["email"];

                return true;
            } else {
                array_push($this->errorList, "Gebruikersnaam of wachtwoord is fout.");
                return false;
            }
        } else {
            array_push($this->errorList, "Er is iets fout gegaan.");
            return false;
        }
    }

    public function validate($email, $password, $passwordRepeat)
    {
        $valid = true;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            array_push($this->errorList, "Het wachtwoord moet Minimaal 8 karakters bevatten met een hoofdletter en nummers.");
            $valid = false;
        }

        if ($password != $passwordRepeat) {
            array_push($this->errorList, "Het wachtwoord komen niet met elkaar overeen.");
            $valid = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorList, "De email adres klopt niet.");
            $valid = false;
        }

        if ($valid) {
            return true;
        }
        return false;
    }
}