<?php

class Account
{
    private $db;
    private $userID;
    private $salt = "AJGEA";

    public $errorList = [];

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    public function getUserList($pagination = 0)
    {
        $q = $this->db->prepare("SELECT * FROM User u JOIN Function f ON u.FunctionID = f.FunctionID LIMIT 10 OFFSET ?");
        $q->bindValue(1, intval($pagination * 10, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }

    public function getUser($userID)
    {
        $this->userID = $userID;
        $q = $this->db->prepare("SELECT * FROM User u JOIN Userinfo i ON u.UserID = i.UserID JOIN Address a ON u.UserID = a.UserID WHERE u.UserID = ?");
        $q->bindValue(1, $userID, \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll()[0];
        } else {
            return $q->errorCode();
        }
    }

    public function updatePassword($password)
    {
        if($this->validate($password)) {
            $getmail = $this->db->prepare("SELECT Email FROM User WHERE UserID = ?");
            $getmail->bindValue(1, $this->userID);
            $getmail->execute();
            $email = $getmail->fetchAll()[0]["Email"];

            $passhash = hash("sha512", $password . $this->salt . $email);
            $q = $this->db->prepare("UPDATE User SET PassHash = ? WHERE UserID = ?");
            $q->bindValue(1, $passhash);
            $q->bindValue(2, $this->userID);
            if($q->execute()) {
                return true;
            } else {
                array_push($this->errorList, "Er is iets fout gegaan: " . $q->errorCode());
                return false;
            }
        } else {
            return false;
        }
    }

    //    Validatie functie
    public function validate($password)
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

        if ($valid) {
            return true;
        }
        return false;
    }

    public function updateInfo($userID, $city, $streetName, $houseNumber, $addition, $zipcode, $phoneNumber)
    {
        $q = $this->db->prepare("UPDATE Address SET City = ?, StreetName = ?, HouseNumber = ?, Addition = ?, ZipCode = ?, PhoneNumber = ? WHERE UserID = ?");
        $q->bindValue(1, $city);
        $q->bindValue(2, $streetName);
        $q->bindValue(3, $houseNumber);
        $q->bindValue(4, $addition);
        $q->bindValue(5, $zipcode);
        $q->bindValue(6, $phoneNumber);
        $q->bindValue(7, $userID);

        if ($q->execute()) {
            return true;
        } else {
            array_push($this->errorList, "Er is iets fout gegaan." . $q->errorCode());
            return false;
        }
    }
}