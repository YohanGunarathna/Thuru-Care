<?php
session_start();
header("Content-Type:application/json");

$output=shell_exec('python leaf_process.py');
$outputfinal = str_replace(array('[',']',"'"), '',$output);
//$outputfinal=" Potato Early blight";
$outputfinal=trim($outputfinal);
if (($outputfinal=="unhealthy")) {

		$output_trunk=shell_exec('python trunk_process.py');
		$output_trunk_final = str_replace(array('[',']',"'"), '',$output_trunk);
		$output_trunk_final=trim($output_trunk_final);
		


	if($output_trunk_final=="healthy"){
		$outputfinal="unhealthy";
	}else{
		$outputfinal="healthy";
	}

}else{
		$outputfinal="healthy";
}

include('config.php');
//query to get data from the table

$query = sprintf("SELECT `status`,`solution`  FROM disease_data WHERE `status`='$outputfinal'");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//now print the data
print json_encode($data);

?>
