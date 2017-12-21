<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 20-12-2017
 * Time: 13:02

JOIN Userinfo i ON u.UserID = i.UserID
JOIN User u ON s.UserID = u.UserID*/

class Storingdash
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    public function getStoringenList($pagination = 0)
    {
        $q = $this->db->prepare("SELECT * FROM Storing s  LIMIT 10 OFFSET ?");
        $q->bindValue(1, intval($pagination * 10, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }

    public function getStoring($Offerteid)
    {
        $q = $this->db->prepare("SELECT * FROM Storing WHERE Offerteid = ?");
        $q->bindValue(1, $Offerteid, \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll()[0];
        } else {
            return $q->errorCode();
        }
    }

}