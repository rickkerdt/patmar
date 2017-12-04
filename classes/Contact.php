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
                <p><h4>Email</h4><br>'.$email.'</p>
                <p><h4>Naam</h4><br>'.$name.'</p>
                <p><h4>Adres</h4><br>'.$adres.'</p>
                <p><h4>Telefoonnummer</h4><br>'.$telefoonnumer.'</p>
                <p><h4>Woonplaats</h4><br>'.$woonplaats.'</p>
                <p><h4>Bericht</h4><br>'.$bericht.'</p>';
            }
            }
    }
}


K