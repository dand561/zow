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

//$sql_query = "SELECT * FROM `animals` WHERE 'popular_name' LIKE '$popular_name';";
$sql_query = "SELECT * FROM `animals` WHERE popular_name LIKE 'LION'";
$result = mysql_query($sql_query);

if(!$result){
	die('Error: ' . mysql_error());
} else {
	echo "<table>";
	while($row = mysql_fetch_assoc($result)){
		echo "<tr>";
		foreach ($row as $value) {
			echo "<td>".$value."</td>"; 
		}
		echo "</tr>";
	}
	echo "<table>";
	mysql_free_result($result);
}

mysql_close();

?>