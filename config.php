<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shopdogiadung";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    echo "Connect failed";
}
?>