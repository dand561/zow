
<?php
define('DB_NAME', 'zowdatabase');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if(!$conn){
	die('Cannot connect to database. Error: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $conn);

if(!$db_selected){
	die('Cannot use ' . DB_NAME . ': ' . mysql_error());
}

if(isset($_POST['popular_name'])){
	$popular_name = $_POST['popular_name'];
}

$send = "SELECT ID FROM `animals` WHERE popular_name='$popular_name'";

$result = mysql_query($send);

$id=0; 

if(!$result){
	die('Error: ' . mysql_error());
} else {
	while ($row = mysql_fetch_assoc($result)) {

		$id = $row['ID'];
		

	

	$retrieve = "DELETE FROM `animals` WHERE ID = '$id'"; 
    header("Location:../html/delete.php");}
	
	if(!mysql_query($retrieve)){
		die('Error: ' . mysql_error());
	} else {

	}
}

mysql_close();

?>