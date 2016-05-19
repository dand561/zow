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

$popular_name = $_POST['popular_name'];
$scientific_name = $_POST['scientific_name'];
$family = $_POST['family'];
$description = $_POST['description'];
$origin = $_POST['origin'];
$status = $_POST['status'];
$climate = $_POST['climate'];
$dangerousness = $_POST['dangerousness'];
$special_prop = $_POST['special_prop'];
$related_species = $_POST['related_species'];
$enemies = $_POST['enemies'];
$nourishment = $_POST['nourishment'];
$breeding = $_POST['breeding'];
$fur = $_POST['fur'];
$training = $_POST['training'];


$sql_query = "INSERT
INTO
`animals`(
`popular_name`,
`scientific_name`,
`family`,
`description`,
`origin`,
`status`,
`climate`,
`dangerousness`,
`special_prop`,
`related_species`,
`enemies`,
`nourishment`,
`breeding`,
`fur`,
`training`
)
VALUES(
'$popular_name',
'$scientific_name',
'$family',
'$description',
'$origin',
'$status',
'$climate',
'$dangerousness',
'$special_prop',
'$related_species', 
'$enemies',
'$nourishment',
'$breeding',
'$fur',
'$training'
)";

if(!mysql_query($sql_query)){
	die('Error: ' . mysql_error());
}

mysql_close();

?>