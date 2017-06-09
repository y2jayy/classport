// <?php
// // $arr = array();
// // $arr[0] = 1;
// // $arr[1] = "hello world";
// // var_dump(count($arr));
// // unset($arr[1]);
// // var_dump(count($arr));
// // die('xxx');

// //array_search is like the array analogue of strpos for strings
// try {
// 	$db = new SQLite3("../dbsupery00n.db");
// } catch (Exception $e) {
// 	echo $e->getMessage();
// }
// $row = 1;
// $uniqueCollegeIDs = array();
// if (($handle = fopen("colleges.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         echo "<p> $num fields in line $row: <br /></p>\n";
//         $row++;
//         for ($c=0; $c < $num; $c++) {
//         	if ($c == 0) {
//         		if (!in_array($data[$c], $uniqueCollegeIDs)) {
//         			$uniqueCollegeIDs[] = $data[$c];
//         		}	
//             }
//             // echo $data[$c] . "<br />\n";
//         }
//         // if ($row > 30000) {
//         // 	break;
//         // }
//     }
//     fclose($handle);
// }

// $colleges = array();

// echo "<pre>";
// print_r($uniqueCollegeIDs);
// echo "</pre>";

// $row = 1;
// if (($handle = fopen("colleges.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//     	echo "how many times " + $row;
//         $num = count($data);
//         // echo "<p> $num fields in line $row: <br /></p>\n";

//         if (in_array($data[0], $uniqueCollegeIDs)) {

//         	$key = array_search($data[0], $uniqueCollegeIDs);
//         	unset($uniqueCollegeIDs[$key]);
//         	$colleges[] = array(
//         		institution_id => $data[0],
//         		institution_name => $data[1],
//         		institution_state => $data[4]
//         	);
//         }
//         $row++;
//         for ($c=0; $c < $num; $c++) {
//             // echo $data[$c] . "<br />\n";
//         }
//         // if ($row > 30000) {
//         // 	break;
//         // }
//     }
//     fclose($handle);
// }
// echo "<pre>";
// print_r($colleges);
// echo "</pre>";
// $valuesArray = array();
// for($i=0; $i < sizeof($colleges); $i++) {
// 	// echo $colleges[$i]["institution_id"];
// 	if (strcasecmp($colleges[$i]["institution_id"], "institution_id"))
// 		$valuesArray[] = "(\"".implode("\",\"", $colleges[$i])."\")";
// }
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

// // $values = implode(",\n", $valuesArray);

// // $sql = "INSERT INTO institutions (`institution_id`,`institution_name`,`institution_state`) VALUES $values";	
// // fwrite($myfile, $sql);
// // fclose($myfile);


// $batchSize = 500;
// for ($i=0; $i<ceil(sizeof($valuesArray)/$batchSize); $i++) {
// 	$values = implode(",\n", array_slice($valuesArray,$batchSize*i,$batchSize));

// 	$sql = "INSERT INTO institutions (`institution_id`,`institution_name`,`institution_state`) VALUES $values";	
// 	print $sql;
// 	fwrite($myfile, $sql+"\n\n");
// 	// if ($db->query($sql)) {
// 	// 	echo "\n\nsuccess\n\n";
// 	// } else {
// 	// 	die("failed");
// 	// }
// }
// fclose($myfile);


// ?>