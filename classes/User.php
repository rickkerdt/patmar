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

    public function register($email, $password, $repeatpassword, $firstname, $lastname)
    {
        $this->passhash = hash("sha512", $password . $this->salt . $email);

        $this->email = $email;

        if ($this->validate($this->email, $password, $repeatpassword)) {
            $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
            $db2 = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

            $q = $db->prepare("INSERT INTO User(Email, PassHash, FunctionID) VALUES (?, ?, 2)");

            $q->bindValue(1, $this->email);
            $q->bindValue(2, $this->passhash);

            if ($q->execute()) {

                $q->closeCursor();

                $q2 = $db2->prepare("INSERT INTO Userinfo(UserID, FirstName, LastName) VALUES ((SELECT UserID FROM User WHERE Email = ?),?,?)");

                $q2->bindValue(1, $this->email);
                $q2->bindValue(2, $firstname);
                $q2->bindValue(3, $lastname);

                if ($q2->execute()) {
                    return true;
                } else {
                    var_dump($q2->errorCode());

                    die();
                    array_push($this->errorList, "Er is iets fout gegaan.2");
                    return false;
                }
            } else {
                var_dump($q->errorCode());
                die();
                array_push($this->errorList, "Er is iets fout gegaan.1");
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

        $q = $db->prepare("SELECT * FROM User WHERE Email = ? AND PassHash = ?");

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
            array_push($this->errorList, "Het wachtwoord moet Hoofdletter, Nummer bevatten en minimaal 8 letters lang zijn.");
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