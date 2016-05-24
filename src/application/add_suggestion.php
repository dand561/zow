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

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$send = "INSERT INTO `suggestions`(`name`,`email`,`subject`) 
		VALUES('$name','$email','$subject')";

if(!mysql_query($send)){
	die('Error: ' . mysql_error());
}

mysql_close();

?>