<?php

$localhost="localhost";
$root_name="root";
$db_name="insurance";
$my_db_pass="";

try{
    $pdo=new PDO("mysql:host=$localhost;dbname=$db_name",$root_name,$my_db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(!$pdo){
        die("Unable to conect to db");
    }
}catch(PDOException $e){
    echo error_log("an error has occured".$e->getMessage());
  die("An error has occured, kindly try again later");
}
