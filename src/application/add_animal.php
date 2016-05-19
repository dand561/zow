<?php
define('DB_NAME', 'zowdatabase');
define('DB_USER', 'root');
define('DB_PASSWORD', 'zowTW2016');
define('DB_HOST', 'localhost');

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if(!$conn){
	die('Cannot connect to database. Error: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $conn);

if(!$db_selected){
	die('Cannot use ' . DB_NAME . ': ' . mysql_error());
}

$popular_name = $_POST['popular_name'];
$scientific_name = $_POST['scientific_name'];
$family = $_POST['family'];
$description = $_POST['description'];
$origin = $_POST['origin'];
$status = $_POST['status'];
$climate = $_POST['climate'];
$habitate = $_POST['habitate'];
$dangerousness = $_POST['dangerousness'];
$special_prop = $_POST['special_prop'];
$related_species = $_POST['related_species'];
$enemies = $_POST['enemies'];
$nourishment = $_POST['nourishment'];
$breeding = $_POST['breeding'];
$fur = $_POST['fur'];
$fur_color = $_POST['fur_color'];
$training = $_POST['training'];

$send = "INSERT INTO `animals`(`popular_name`,`scientific_name`,`family`,`description`,`origin`,`status`,`climate`,`habitate`,`dangerousness`,`special_prop`,`related_species`,`enemies`,`nourishment`,`breeding`,`fur`,`fur_color`,`training`)
VALUES('$popular_name','$scientific_name','$family','$description','$origin','$status','$climate','$habitate','$dangerousness','$special_prop','$related_species', '$enemies','$nourishment','$breeding','$fur','$fur_color','$training')";

if(!mysql_query($send)){
	die('Error: ' . mysql_error());
}

if (isset($_GET['ID'])) {
	$id = $_GET['ID'];

	$retrieve = "SELECT * FROM `animals` WHERE ID LIKE '$id'";
	if(!mysql_query($retrieve)){
		die('Error: ' . mysql_error());
	}

	while($row = mysqli_fetch_array($retrieve)){

	}
}

mysql_close();

?>