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

    public function register($email, $password, $repeatpassword)
    {
        $this->passhash = hash("sha512", $password . $this->salt . $email);

        $this->email = $email;
    }

    public function validate($email, $password, $passwordRepeat)
    {
        $valid = true;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            array_push($this->errorList, "Het wachtwoord moet Minimaal 8 karakters bevatten met een hoofdletter en nummers.");
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