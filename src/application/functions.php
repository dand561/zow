<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zowdatabase";

// Create connection

$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection

function getImage($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT link FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
    /* while($row = $result->fetch_assoc()) {
         $j++;
         if($j==$i)
            return $row["username"];
         
     }*/
     $row = $result->fetch_assoc();
      return '<img width="100" height="100" src="'.($row['link'] ).'"/>';
     
} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getNumRecords()
{if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID FROM animals";
$result = $GLOBALS["connection"]->query($sql);
$nr=0;
if ($result->num_rows > 0) {
     
   while($row = $result->fetch_assoc()){
   $nr++;}
    
}
return $nr;

$GLOBALS["conn"]->close();

}

function getPName($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT popular_name FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["popular_name"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}

function getClimate($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT climate FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["climate"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}

function getDanger($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT dangerousness FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["dangerousness"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}

function getLink($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT link FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["link"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}

function getFur($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT fur FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["fur"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}


function getFurColor($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT fur_color FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["fur_color"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;

}


function getSName($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT scientific_name FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["scientific_name"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getTraining($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT training FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["training"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getRelatives($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT related_species FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["related_species"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getBreeding($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT breeding FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["breeding"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getOrigin($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT origin FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["origin"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getCategory($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT category FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["category"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getNourishment($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT nourishment FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["nourishment"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getFamily($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT family FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["family"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getStatus($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT status FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["status"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getEnemies($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT enemies FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["enemies"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getHabitate($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT habitate FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["habitate"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getDescription($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT description FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["description"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function getSpecialProp($i)
{//$j=0;
if ($GLOBALS["connection"]->connect_error) {
     die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT special_prop FROM animals where ID=$i;";
$result = $GLOBALS["connection"]->query($sql);

if ($result->num_rows > 0) {
     
     $row = $result->fetch_assoc();
   
     return $row["special_prop"];

} else {
     return null;;
}

$GLOBALS["connection"]->close();
return null;


}

function show($i)
            {echo $i;
            echo"<div id=".$i." class=\"modal\">
            

  			<!-- Modal content -->
  				<div class=\"modal-content\">
   					 <div class=\"modal-header\">
     					 <span class=\"close\">×</span>
     					 <h1>".getPname($i)."</h1>
     					 <p>Related Species:</p>
     					 <h4>".getRelatives($i)."</h4>
     					 <h2>".getImage($i)."</h2>      					
    				</div>
   				 <div class=\"modal-body\">
     				<p>".getDescription($i)."</p> 
     				 <p>Level of danger:  <p>".getDanger($i)."</p> </p>
     				 <p>Enemies: <p>".getEnemies($i)."</p> </p>
     				 <p>Can it be trained ?<p>".getTraining($i)."</p></p>
    			</div>
    			<div class=\"modal-footer\">
     				 <h2>".getSname($i)."</h2>
    			</div>
  				</div>

			</div>";

			}

?>  