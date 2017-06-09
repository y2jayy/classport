<?php 
$str = "hello wosssrld";
try {
	$db = new SQLite3("../dbsupery00n.db");
} catch (Exception $e) {
	die("Connection failed");
}