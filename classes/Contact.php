<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 30-11-2017
 * Time: 13:54
 */

class Contact
{
    function statusMsg(){
    print ($statusMsg = '');
    }
    //cheken of de benodigde velden niet leeg zijn.
    public function sendform($email,$name, $adres, $telefoonnumer, $woonplaats, $bericht)
    {
        if(!empty($email) && !empty($name) && !empty($adres) && !empty($telefoonnumer) && !empty($woonplaats) && !empty($bericht)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                print $statusMsg = 'Please enter your valid email.';

            }else{
                // Mail naar ontvaner email.
                $toEmail = 'test@mail.com';
                $emailSubject = 'Gegevens verstuurd door '.$name;
                $contentsrequest = '<h2>Contact aanvraag verstuurd.</h2>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Addres</h4><p>'.$adres.'</p>
                <h4>Telefoonnummer</h4><p>'.$telefoonnumer.'</p>
                <h4>Woonplaats</h4><p>'.$woonplaats.'</p>
                <h4>Bericht</h4><p>'.$bericht.'</p>';
            }
        }

    }
}


