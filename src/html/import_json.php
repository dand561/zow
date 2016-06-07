<?php
    //connect to mysql db

$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);

$ext = pathinfo($target_file,PATHINFO_EXTENSION);


 if(isset($_POST["submit2"])) {
         $connection = new mysqli("localhost", "drgmrsc", "zowTW2016", "zowdatabase") or die ("ERROR: Cannot connect");    //connect to the employee database

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