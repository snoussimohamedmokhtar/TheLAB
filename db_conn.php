<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "projetweb";

try {
	$conn = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
