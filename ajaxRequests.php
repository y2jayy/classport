<?php
include("db_connect.php");
$file = $_GET["file"];
$method = $_GET["method"];

//loginregister.php ajax requests
if ($file == "loginregister") {

	if ($method == "getInstitutions") {
		$result = $db->query("SELECT institution_name FROM institutions WHERE Institution_State=\"$_GET[state]\" GROUP BY institution_id ORDER BY institution_name");
		$institutions = array();
		while($record = $result->fetchArray()) {
			$institutions[] = $record["Institution_Name"];
		}
		echo json_encode($institutions);
	}

}
?>