<?php
/**
 * Created by PhpStorm.
 * User: rickpaassen
 * Date: 19-12-17
 * Time: 09:57
 */
$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];


try {
    require "db_config.php";
} catch(Exception $e) {
    exit('Unable to connect to database.');
}


$sql = "UPDATE events SET title=?, start=?, end=? WHERE id=?";
$q = $bdd->prepare($sql);
$q->execute(array($title,$start,$end,$id));


