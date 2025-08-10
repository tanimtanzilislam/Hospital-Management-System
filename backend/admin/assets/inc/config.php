<?php
$dbuser = "root";
$dbpass = "";  // ✅ Use empty string for default XAMPP
$host = "localhost";
$db = "hmisphp";

$mysqli = new mysqli($host, $dbuser, $dbpass, $db);

// Handle connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
