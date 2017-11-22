<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/16/2017
 * Time: 13:15
 */

class Account
{
    private $username;
    private $hash;
    private $password;
    private $token;
    private $function;
    private $userID;
    private $salt = "SALTIESTSALT";

    public function __construct()
    {

    }

    public function getAccount($userID)
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

    public function register($firstname, $lastname, $email, $password)
    {
        $user = new User();
        $userID = $user->addUser($firstname, $lastname, "klant");

        $hash = hash("sha512", $password . $this->salt);

        $values = [$email, $hash];

        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");

        $q = $db->prepare("INSERT INTO account(Email, UserID, PassHash, Function) VALUES (?,?,?,'klant')");

        $q->bindValue(1, $email);
        $q->bindValue(2, $userID);
        $q->bindValue(3, $hash);

        $q->execute();
    }

    public function login($email, $password)
    {
        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");
        $hash = hash("sha512", $password . $this->salt);
        $q = $db->prepare("SELECT * FROM account WHERE Email = :email AND PassHash = :passhash LIMIT 1");
        $q->bindValue(":email", $email);
        $q->bindValue(":passhash", $hash);


        if ($q->execute())
        {
            if ($q->rowCount() > 0) {
                $result = $q->fetchAll()[0];

                $_SESSION["loggedIn"] = "true";
                $_SESSION["username"] = $result["Email"];

                header("Location: /index.php?page=home");
            } else {
                die("incorrect password or username");
            }
        } else {
            die("errors");
        }
    }
}