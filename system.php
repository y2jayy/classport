#!/usr/local/bin/php
<?php
// die($_SERVER[HTTP_HOST]." .. ".$_SERVER[REQUEST_URI]);
// define('BASE_URL',dirname(__DIR__));

if (!isset($_GET["controller"]) && !isset($_POST["controller"])) {
	$class = "Friend";
	$method = "index";
} else if (!isset($_GET["method"]) && !isset($_POST["method"])) {
	$method = "index";
} else {
	$class = isset($_GET["controller"])?ucfirst($_GET["controller"]):ucfirst($_POST["controller"]);
	$method = isset($_GET["method"])?$_GET["method"]:$_POST["method"];
}
echo "<pre>";
print_r($_SERVER);
print_r($_GET);
// die('xxx');
include("controllers/Controller.php");
include("controllers/$class.php");
$controller = new $class();
$method = "index";
$controller->$method();
