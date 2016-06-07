<!DOCTYPE html>
<html>
<head>
<title>Zoo on Web</title>
    <link rel="stylesheet" type="text/css" href="../html/css/main.css"/>

</head>
<body bgcolor="#E3E3E3">

    <nav id="navigation" class="clearfix">
      <ul>
        <li><a href="../html/index.html">Home</a></li>
        <li><a href="../html/search.html">Search</a></li>
        <li><a href="../html/categories.html">Categories</a></li>
        <li><a href="../html/contact.html">Contact</a></li>
        <li style="float:right"><a class="right-login" href="../html/login.html">Login</a></li>
      </ul>
    </nav>
    <table id="search" >
		<tr>
  			<th>Popular name</th>
  			<th>Scientific name</th>
			<th>Family</th>  			
 			<th>Origin</th>
 			<th>Status</th>
 			<th>Habitate</th>
 			<th>Climate</th>
 			<th>Enemies</th>
 			<th>Nourishmen</th>
 			<th>Category</th>
 			<th>Details</th>
		</tr>
	
 
<?php
require("functions.php");
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
$sql_query = "SELECT ID FROM `animals` WHERE ";

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

// Create array for storing retreived ids
	$ids = array ();

$result = mysql_query($sql_query);
if(!$result){
    die('Error: ' . mysql_error());
} else {
   
    while($row = mysql_fetch_assoc($result)){
        echo "<tr>";
        foreach ($row as $value) { 
            echo "<td>".getPname($value)."</td>";
            echo "<td>".getSname($value)."</td>";
            echo "<td>".getFamily($value)."</td>";
            echo "<td>".getOrigin($value)."</td>";
            echo "<td>".getStatus($value)."</td>";
            echo "<td>".getHabitate($value)."</td>";
            echo "<td>".getClimate($value)."</td>";
            echo "<td>".getEnemies($value)."</td>";
            echo "<td>".getNourishment($value)."</td>";
            echo "<td>".getCategory($value)."</td>";
          /*  echo "<td>"<button id="myBtn">"Open Modal"</button>"</td>";*/
            echo '<td> <button class = "myBtn">More details</button></td>';
            
             echo "</tr>";
             
            ?>
            <div id="myModal" class="modal">
            

  			<!-- Modal content -->
  				<div class="modal-content">
   					 <div class="modal-header">
     					 <span class="close">x</span>
     					 <?php echo "<h1>".getPname($value)."</h1>"; ?>
     					 <?php echo "<h4>Related Species:".getRelatives($value)."</h4>"; ?>
     					 <?php echo "<h2>".getImage($value)."</h2>"; ?>      					
    				</div>
   				 <div class="modal-body">
     				<?php echo "<p>".getDescription($value)."</p>"; ?> 
     				<?php echo "<p>Level of danger:".getDanger($value)."</p>"; ?>
     				<?php echo "<p>Enemies: ".getEnemies($value)."</p>"; ?>
     				 <?php echo "<p>Can it be trained ? ".getTraining($value)."</p>"; ?>
    			</div>
    			<div class="modal-footer">
     				 <?php echo "<h2>Scientific name: ".getSname($value)."</h2>"; ?> 
    			</div>
  				</div>

			</div>

          	<?php array_push($ids, $value);
       		
        }

       
    }
    mysql_free_result($result);
  
}

mysql_close(); 
?>

</table>

   <footer>
        <div id="copyright">
            <p> Copyright &#9400; 2016 &bull; All rights reserved </p>
        </div>

        <div id="links">
            <a href="https://github.com/dand561/zow">ZoW on Github</a> &laquo; 
            <a href="http://www.info.uaic.ro/bin/Main/" >Faculty of Computer Science</a> &raquo;
            <a href="http://profs.info.uaic.ro/~busaco/teach/courses/web/">Web technologies</a>
        </div>
    </footer>
    <script>

	var modal = document.getElementsByClassName('modal');

	// Get the button that opens the modal
	
  	var btn = document.getElementsByClassName("myBtn");
  	var toggleModal = function (id) {
	  	var modal = document.getElementsByClassName('modal')[id];
	  	var span = document.getElementsByClassName("close")[id];
	  	modal.style.display = "block";

	  	span.addEventListener('click', function() {
	  		modal.style.display = "none";
	  	});
	}

  	for(var i=0; i<btn.length; i++) {
  		(function(i) {
  			var modal = document.getElementsByClassName('myBtn')[i];
  			modal.addEventListener('click', function() {toggleModal(i)}, false);
  		})(i, this);
	}
      

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
   		if (event.target == modal) {
        	modal.style.display = "none";
   		}
	}
</script>
</body>
</html>