<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "hotel_management";


//create connection 

$conn = mysqli_connect($server, $username, $pass, $db);


//mathsck conncetion

if ($conn->connect_error) {

	die("Connection Failed!" . $conn->connect_error);
}

mysqli_set_charset($conn,"utf8");