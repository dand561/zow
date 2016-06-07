<?php
//open connection to mysql db
$connection = mysqli_connect("localhost","drgmrsc","zowTW2016","zowdatabase") or die("Error " . mysqli_error($connection));

//fetch table rows from mysql db
$sql = "select ID, link, popular_name, scientific_name, category, family, origin, status, climate,
habitate, dangerousness, special_prop, related_species, enemies, 
nourishment, breeding, fur, fur_color, training
from animals where category = \"Reptile\"";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
$emparray[] = $row;
}
//write to json file

$encode = json_encode($emparray);
$fp = fopen('reptiles.json', 'w');
fwrite($fp, $encode);
fclose($fp);
header('content-type: text/json');
header('Content-Disposition: attachment; filename="reptiles.json"');

//close the db connection
mysqli_close($connection);
?>