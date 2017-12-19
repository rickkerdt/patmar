<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time:14:08
*/
/**
$file_result =" ";

if($_FILES["file"]["error"]> 0){
    $file_result ="Geen bestand geupload of een verkeerd bestand";
    $file_result ="Error Code: ". $_FILES["file"]["error"]."<br>";
} else{
    $file_result =
        "Upload: ". $_FILES["file"]["name"] ."<br>".
        "Type: ". $_FILES["file"]["type"] ."<br>".
        "Size: ". ($_FILES["file"]["size"] / 1024)."Kb<br>".
        "Temp file: ". $_FILES["files"]["tpm_name"]."<br>";

        move_uploaded_file($_FILES["file"]["tmp_name"],"/uploads".$_FILES["file"]["name"]);

        $file_result = "Upload gelukt";
}
*/

if (isset($_POST['Versturen'])){
    $bestand = $_FILES['bestand'];
    print_r($bestand);//Niet vergeten weg tehalen print de row voor testen

    $bestandnaam = $_FILES['bestand']['name'];
    $bestandTpmNaam = $_FILES['bestand']['tpm_name'];
    $bestandgroote = $_FILES['bestand']['size'];
    $bestanderror = $_FILES['bestand']['error'];
    $bestandtype = $_FILES['bestand']['type'];

    $bestandExt = explode(".",$bestandnaam);
    $bestandActualExt = strtolower(end($bestandExt));

    $toegestaan = array('jpg','jpeg',"png",'pdf',"zip");

    if (in_array($bestandActualExt,$toegestaan)){
        if($bestanderror === 0){
            if ($bestandgroote < 100000){
                $bestandnaamNieuw = uniqid(" ", true). "." .$bestandActualExt;
                $bestandlocatie = "uploads/".$bestandnaamNieuw;
                move_uploaded_file($bestandTpmNaam, $bestandlocatie);
                header("Locatie: index.php?uploadsuccess");
            }else{
                print("Dit bestand is te groot");
            }
        }else{
            print("Er was een error met het uploaden van uw bestand!");
        }
    }else{
        print ("U kunt dit bestand type niet uploaden.");
    }
}