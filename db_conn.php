<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Connection failed: ". mysqli_connect_error());
}else{
    // echo"Connected Successfully";
}





?>