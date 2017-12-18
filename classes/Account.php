<?php

class Account
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    public function getUserList($pagination = 0)
    {
        $q = $this->db->prepare("SELECT * FROM User u JOIN Function f ON u.FunctionID = f.FunctionID LIMIT 25 OFFSET ?");
        $q->bindValue(1, intval($pagination * 25, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }

    public function getUser($userID)
    {
        $q = $this->db->prepare("SELECT * FROM User WHERE UserID = ?");
        $q->bindValue(1, $userID, \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll()[0];
        } else {
            return $q->errorCode();
        }
    }
}