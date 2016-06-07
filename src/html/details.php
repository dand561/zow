<?php
session_start();
require("functions.php");
$id= $_GET["id"];

?>
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
</body>
</html>
<?php
echo"<div class=\"container\">
   					 <div class=\"header\">
     					 <h1>".getPname($id)."</h1>
     					 
     					 <h4>Related Species:".getRelatives($id)."</h4>
     					 <h2>".getImage($id)."</h2>     					
    				</div>
   				 <div class=\"bbody\">
     				 <p>".getDescription($id)."</p>
     				 <p>Level of danger: ".getDanger($id)."</p>
     				 <p>Enemies:".getEnemies($id)."</p>
     				 <p>Can it be trained ? ".getTraining($id)." </p>
    			</div>
    			<div class=\"ffooter\">
     				 <h2>".getSname($id)."</h2> 
    			</div>
  				</div>

			</div>";
?>