<?php
    try{
        $cnx= new PDO('mysql:host=localhost;dbname=clinique', 'root', '');
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    catch(PDOException $e){
        echo "Connection a MySql impossible :", $e->getMessage();
        exit(); //ou die();
    }
?>