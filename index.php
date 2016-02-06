<?php

if(!$_POST){
	require "page.html";
} else {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	queueAssignment($name, $email, $phone);
	header("Location: success.html");

}
/**
 * This function will take 3 arguments and pass it to gearman worker to store in database
*/
function queueAssignment($name, $email, $phone) {
	$detailsArray = array('name' => $name, 'email' => $email, 'phone' => $phone);
	$detailsStr = json_encode($detailsArray);
	writeFile($detailsArray);
	// client code
	$client = new GearmanClient();
	$client->addServer();
	$store = $client->do("saveRecord", $detailsStr);
}

/**
 * This function will take the data and stores in json file
*/
function writeFile($data) {
	$my_file = "users.json";
	$users = [];
	if(file_exists($my_file)){
		$users = json_decode(file_get_contents($my_file), true);
	}
	$users[] = $data;
	$jsonData = json_encode($users);
	file_put_contents($my_file, $jsonData);
}



?>