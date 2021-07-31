<?php
    try{
    $db = new PDO("mysql:host=localhost;dbname=phppdo;charset=utf8","root","");
    }
    catch(PDOException $e)
    {
        echo "Hata " . $e-> getMessage();
        die();
    }
?>