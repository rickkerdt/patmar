<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 20-12-2017
 * Time: 13:02
 */

class Storingdash
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    public function getOfferteList($pagination = 0)
    {
        $q = $this->db->prepare("SELECT * FROM Offerte o JOIN Userinfo U ON o.UserID = u.UserID LIMIT 10 OFFSET ?");
        $q->bindValue(1, intval($pagination * 10, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }

    public function getOfferte($Offerteid)
    {
        $q = $this->db->prepare("SELECT * FROM Offerte WHERE Offerteid = ?");
        $q->bindValue(1, $Offerteid, \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll()[0];
        } else {
            return $q->errorCode();
        }
    }

}