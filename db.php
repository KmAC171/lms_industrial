<?php

$host = "localhost";
$user = "root";
$password = "@KmAC0752953983";
$database = "learnhub";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if(!$conn){
    die("Database Connection Failed");
}

?>