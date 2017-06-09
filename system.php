#!/usr/local/bin/php
<?php
// die($_SERVER[HTTP_HOST]." .. ".$_SERVER[REQUEST_URI]);
// define('BASE_URL',dirname(__DIR__));
$GLOBALS["BASE_URL"] = "$_SERVER[SERVER_NAME]:$_SERVER[SERVER_PORT]$_SERVER[REQUEST_URI]";

// var_dump(BASE_URL);
// die('gets here gain');
$REQUEST_URI = explode("/",$_SERVER["SCRIPT_NAME"]);
if ($REQUEST_URI[count($REQUEST_URI)-1] == "") {
	unset($REQUEST_URI[count($REQUEST_URI)-1]);
}
if ($REQUEST_URI[0] == "") {
	unset($REQUEST_URI[0]);
}
$uri = array();
foreach ($REQUEST_URI as $segment) {
	$uri[] = $segment;
}

if (count($uri) == 1 && $uri[0] == "classport") {
	//Default Controller and method
	$class = "Friend";
	$method = "index";
} else if (count($uri) == 2 && $uri[0] == "classport" && $uri[1] == "index.php" ) {
	$class = "Friend";
	$method = "index";	
} else if (count($uri) == 3) {
	$class = "Friend";
} else {
	$class = $uri[2];
	$method = $uri[3];
}
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
