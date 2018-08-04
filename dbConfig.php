<?php
// Database configuration
$dbHost     = "db4free.net";
$dbUsername = "harshapp";
$dbPassword = "123456789";
$dbName     = "harshapp";

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
?>