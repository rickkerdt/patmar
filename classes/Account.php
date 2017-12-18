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
        $q = $this->db->prepare("SELECT * FROM User LIMIT 25 OFFSET ?");
        $q->bindValue(1, intval($pagination * 25, 10), \PDO::PARAM_INT);

        if ($q->execute()) {
            return $q->fetchAll();
        } else {
            return $q->errorCode();
        }
    }
}