<?php
/**
 * Created by PhpStorm.
 * User: rickpaassen
 * Date: 19-12-17
 * Time: 09:55
 */
$json = array();


$requete = "SELECT * FROM events ORDER BY id";


try {
    require "../dashboard/db_config.php";
} catch(Exception $e) {
    exit('Unable to connect to database.');
}


$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));


echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));


