<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a168219";
$password = "littlewhitehamster";
$dbname = "a168219";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>