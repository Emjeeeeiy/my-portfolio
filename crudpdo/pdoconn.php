<?php

/*
try {
    $mydb = new PDO ('mysql:host=localhost;adeva_arnold;charset=utf8mb4','wtfvk','wtfvk');
    var_dump($mydb);
    /*
}
catch(Exception $x){
    echo $x->getMessage();  
}*/

$servername = "localhost";
$name = "Manga";
$pass = "Manga";
$db = "manga";
$dsn = "mysql:host=$servername;dbname=$db;charset=utf8mb4";

//optional set of attributes to set
$options = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    );
//connection string (ito na yung tatawagin natin kapag mageexecute na ng query)
$con = new PDO($dsn, $name, $pass, $options);
?>