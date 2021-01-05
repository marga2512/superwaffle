<?php

//parameters

$dbServername = "localhost";
$dbUsername = "soundifyCo";
$dbPassword = "co-Working_123";
$dbName = "Soundify_Co-working_db";

// $connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n" . "<br><br>";

