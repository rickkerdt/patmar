<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time:14:08
*/
$file_result =" ";

if($_FILES["file"]["error"]> 0){
    $file_result .="Geen bestand geupload of een verkeerd bestand";
    $file_result .="Error Code: ". $_FILES["file"]["error"]."<br>";
} else{
    $file_result .=
        "Upload: ". $_FILES["file"]["name"] ."<br>".
        "Type: ". $_FILES["file"]["type"] ."<br>".
        "Size: ". ($_FILES["file"]["size"] / 1024)."Kb<br>".
        "Temp file: ". $_FILES["files"]["tpm_name"]."<br>";

        move_uploaded_file($_FILES["file"]["tmp_name"],"/uploads".$_FILES["file"]["name"]);

        $file_result .= "Upload gelukt";
}
