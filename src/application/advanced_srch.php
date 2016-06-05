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

$fields = ["popular_name","scientific_name","category","family","origin","status","climate","habitate",
	"dangerousness","related_species","enemies","nourishment","fur","training"];

// Checking if all fields were set
foreach ($fields as $field) {
	if (isset($_POST[$field])){
		$$field = $_POST[$field];
		//$$field = mysql_real_escape_string($$field);
    }
}

// Creating a "key => value" array in order to parse it and create the query
$formFields = array("popular_name" => $popular_name, 
	"scientific_name" => $scientific_name, 
	"category" => $category,
	"family" => $family, 
	"origin" => $origin,
	"status" => $status, 
	"climate" => $climate, 
	"habitate" => $habitate, 
	"dangerousness" => $dangerousness, 
	"related_species" => $related_species, 
	"enemies" => $enemies,
	"nourishment" => $nourishment, 
	"fur" => $fur, 
	"training" => $training);

$multipleWords = array("origin","climate","habitate","related_species","enemies");

$createQuery = "";
$sql_query = "SELECT * FROM `animals` WHERE ";

// Creating the query (all conditions after "where" clause)
foreach ($formFields as $key => $value) {
	if(!empty($value)){

		// Checking if $value is a mutiple word field
		if(!in_array($key, $multipleWords)){
			$createQuery = $createQuery . $key . " LIKE " . "'$value'" ." AND ";
		} else {
			$createQuery = $createQuery . $key . " LIKE " . "'%$value%'" ." AND ";
			}
		}
}

// Adding created query to initial query
$sql_query = $sql_query . $createQuery;

// Removing the last " AND "
$sql_query = substr($sql_query, 0, -5);


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
