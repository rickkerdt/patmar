<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time:14:08
*/
     $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Checken of bestand wel een foto is.
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    print "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    print "Betand is niet een foto.";
                    $uploadOk = 0;
                }
                // chekt of het betand een van de volgende extenties heeft JPG, JPEG, PNG & GIF
            }  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    print "Sorry, alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
    $uploadOk = 0;
}
