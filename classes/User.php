<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/16/2017
 * Time: 13:15
 */

class User
{
    private $username;
    private $hash;
    private $password;
    private $token;
    private $function;
    private $userID;

    public function __construct()
    {

    }

    public function getUser($userID)
    {
        $pdo = new PDO("mysql:host=localhost;db=patmar;", "root", "Patmar!");

        $q = $pdo->prepare("SELECT * FROM Account WHERE UserID = :userID");
        $q->bindValue(":userID", $userID);
        try {
            $q->execute();

            if ($q->rowCount() > 0) {
                $result = $q->fetchAll()[0];

                $this->userID = $result["UserID"];
                $this->hash = $result["PassHash"];
                $this->function = $result["Function"];
            } else {
                die("user does not exist");
            }
        } catch (PDOException $PDOException) {
            die("pdo error");
        }
    }

    public function register($username, $password, $userID){

    }
}