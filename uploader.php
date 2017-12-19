<?php

if(isset($_POST["upload"]))
{
    echo $_FILES["file"]["name"];
    $dir = getcwd(). "/uploads/";
    $file = $dir . basename($_FILES["file"]["name"]);
    echo $file;
    try {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $file)){
            echo "works!";
            die();
        } else {
            echo "doesn't work!";
            die();
        }
    } catch (Exception $e)
    {
        var_dump($e);
        die();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/uploader.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="upload" value="Upload">
</form>
</body>
</html>