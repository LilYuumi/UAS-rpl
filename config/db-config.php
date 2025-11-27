<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    $host = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "db_ecom"; 
    
    $con = mysqli_connect($host, $username, $password, $database);

    if (!$con) {
        die("Connection Failed: ". mysqli_connect_error());
    } else {
        echo "Connected Successfully";
    }



?>