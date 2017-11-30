<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 30-11-2017
 * Time: 13:54
 */

class Contact
{
    //cheken of de benodigde velden niet leeg zijn.
    public function sendform($email,$name, $adres, $telefoonnumer, $woonplaats, $bericht)
    {
        if(!empty($email) && !empty($name) && !empty($adres) && !empty($telefoonnumer && $woonplaats && $bericht)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $statusMsg = 'Please enter your valid email.';
                $msgClass = 'errordiv';
            }
        }
    }
}