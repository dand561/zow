
<?php
    //connect to mysql db

$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$ext = pathinfo($target_file,PATHINFO_EXTENSION);
echo $ext;

 if(isset($_POST["submit"])) {
   if ($ext=="json") {
      $connection = mysqli_connect("localhost", "drgmrsc", "zowTW2016", "zowdatabase") or die ("ERROR: Cannot connect");    //connect to the employee database

    //read the json file contents
    $jsondata = file_get_contents($target_file);
    
    //convert json object to php associative array
    $data = json_decode($jsondata,true);
    for ($i=0; $i < count($data); $i++) { 
    
    
    $id = $data[$i]["ID"];
    $name = $data[$i]['popular_name'];
    $scient_name = $data[$i]['scientific_name'];
    $category = $data[$i]['category'];
    $family = $data[$i]['family'];
    $origin = $data[$i]['origin'];
    $status = $data[$i]['status'];
    $climate = $data[$i]['climate'];
    $habitate = $data[$i]['habitate'];
    $dangerousness = $data[$i]['dangerousness'];
    $special_prop = $data[$i]['special_prop'];
    $related_species = $data[$i]['related_species'];
    $enemies = $data[$i]['enemies'];
    $nourishment = $data[$i]['nourishment'];
    $breeding = $data[$i]['breeding'];
    $fur = $data[$i]['fur'];
    $fur_color = $data[$i]['fur_color'];
    $training = $data[$i]['training'];
    echo "am ajuns aici";

$sql = "INSERT INTO animals (popular_name,scientific_name,category,family,origin,status,climate,habitate,dangerousness,special_prop,related_species,
enemies,nourishment,breeding,fur,fur_color,training) VALUES
 ('$name', '$scient_name', '$category','$family',
  '$origin','$status','$climate','$habitate','$dangerousness',
  '$special_prop','$related_species','$enemies','$nourishment','$breeding',
  '$fur','$fur_color','$training')";
mysqli_query($connection, $sql) or die ("ERROR: " .mysqli_error($connection) . " (query was $sql)");


}
mysqli_close($connection);
}
else if ($ext=="xml") {
  echo "am ajuns aici";
  importxml($target_file);
}
else die('nu e json si nici xml');
}

function importxml($parameter)
{
$mysql_hostname = "localhost"; // Example : localhost
$mysql_user = "drgmrsc";
$mysql_password = "zowTW2016";
$mysql_database = "zowdatabase";

$xml = simplexml_load_file($parameter) or die("ERROR: Cannot create SimpleXML object");
// open MySQL connection
$connection = mysqli_connect("localhost", "drgmrsc", "zowTW2016", "zowdatabase") or die ("ERROR: Cannot connect");
// process node data
// create and execute INSERT queries
foreach ($xml->ROW0 as $ROW0) {
//  $id = $ROW0->ID;
//  $name = mysqli_real_escape_string($connection, $ROW0->POPULAR_NAME);
$id=$ROW0->ID;
$name = $ROW0->POPULAR_NAME;
$scient_name = mysqli_real_escape_string($connection, $ROW0->ROW1->SCIENTIFIC_NAME);
$category = mysqli_real_escape_string($connection, $ROW0->ROW1->CATEGORY);
$family = mysqli_real_escape_string($connection, $ROW0->ROW1->FAMILY);
$description = mysqli_real_escape_string($connection, $ROW0->ROW1->DESCRIPTION);
$origin = mysqli_real_escape_string($connection, $ROW0->ROW1->ORIGIN);
$status = mysqli_real_escape_string($connection, $ROW0->ROW1->STATUS);
$climate = mysqli_real_escape_string($connection, $ROW0->ROW1->CLIMATE);
$habitate = mysqli_real_escape_string($connection, $ROW0->ROW1->HABITATE);
$dangerousness = mysqli_real_escape_string($connection, $ROW0->ROW1->DANGEROUSNESS);
$special_prop = mysqli_real_escape_string($connection, $ROW0->ROW1->SPECIAL_PROP);
$related_species = mysqli_real_escape_string($connection, $ROW0->ROW1->RELATED_SPECIES);
$enemies = mysqli_real_escape_string($connection, $ROW0->ROW1->RELATED_SPECIES);
$nourishment = mysqli_real_escape_string($connection, $ROW0->ROW1->NOURISHMENT);
$breeding = mysqli_real_escape_string($connection, $ROW0->ROW1->BREEDING);
$fur = mysqli_real_escape_string($connection, $ROW0->ROW1->FUR);
$fur_color = mysqli_real_escape_string($connection, $ROW0->ROW1->FUR_COLOR);
$training = mysqli_real_escape_string($connection, $ROW0->ROW1->TRAINING);

$sql = "INSERT INTO animals (popular_name,scientific_name,category,family,description,origin,status,climate,habitate,dangerousness,special_prop,related_species,
enemies,nourishment,breeding,fur,fur_color,training) VALUES
('$name', '$scient_name', '$category','$family','$description',
  '$origin','$status','$climate','$habitate','$dangerousness',
  '$special_prop','$related_species','$enemies','$nourishment','$breeding',
  '$fur','$fur_color','$training')";
mysqli_query($connection, $sql) or die ("ERROR: " .mysqli_error($connection) . " (query was $sql)");
}
mysqli_close($connection);
}

    

?>