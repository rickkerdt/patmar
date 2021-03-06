<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 19-12-2017
 * Time: 11:54
 */

class Contactdash
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
    }

    /*
     * Lijst met contact berichten ophalen
     */

    public function getContactList($pagination = 0)
    {
        $q = $this->db->prepare("SELECT * FROM Contact LIMIT 10 OFFSET ?");
        $q->bindValue(1, intval($pagination * 10, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }

    /*
     * Contact bericht ophalen
     */

    public function getContact($Contactid)
    {
        $q = $this->db->prepare("SELECT * FROM Contact WHERE Contactid = ?");
        $q->bindValue(1, $Contactid, \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll()[0];
        } else {
            return $q->errorCode();
        }
    }
}


