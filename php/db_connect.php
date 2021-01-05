<?php

//parameters

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Kirby2468";
$dbName = "co-working_project";

// $connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n" . "<br><br>";

