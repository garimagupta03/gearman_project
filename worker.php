<?php
// Worker Code to store values in database
$worker = new GearmanWorker();
$worker->addServer();
$worker->addFunction("saveRecord", function ($job) {
	return insertData($job->workload());
});
while ($worker->work());

function insertData($data) {
	$dataArray = json_decode($data, true);
	// connect to database and save records	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	
	if(! $conn ) {
		return false;
	}
	
	$sql = "INSERT INTO records(name, email, phone) VALUES('".$dataArray['name']."', '".$dataArray['email']."', ".$dataArray['phone'].");";
	mysql_select_db('gearman');
	$retval = mysql_query( $sql, $conn );
	
	if(! $retval ) {
		echo 'Could not enter data: ' . mysql_error();
	} else {
		echo 'Data Stored';
	}
	mysql_close($conn);
	return;
}

?>
