<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/21/2017
 * Time: 15:20
 */



class User
{
    public $UserID;
    public $AddressID;
    public $ContactID;
    public $FirstName;
    public $LastName;
    public $CreationDate;
    public $Function;

    public function addUser($firstname, $lastname, $function)
    {
        $values = [$firstname, $lastname, $function];

        $db = new PDO("mysql:host=localhost;dbname=patmar;", "patmar", "Patmar1!");;

        $q = $db->prepare("INSERT INTO user(FirstName, LastName, Function) VALUES (?,?,?)");

        $q->bindValue(1, $firstname, PDO::PARAM_STR);
        $q->bindValue(2, $lastname, PDO::PARAM_STR);
        $q->bindValue(3, $function, PDO::PARAM_STR);

        $q->execute();

        return $db->lastInsertId();
    }

}
