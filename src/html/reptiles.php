<!DOCTYPE html>
<html>
<head>
<title>Zoo on Web</title>
    <link rel="stylesheet" type="text/css" href="../html/css/main.css"/>

</head>
<body bgcolor="#E3E3E3">

    <nav id="navigation" class="clearfix">
      <ul>
          <?php session_start()?>
        <li><a href="index.php" <?php $_SESSION['loggedin']='true'; ?>>Home</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="categories.php">Categories</a></li>
        <li><a href="contact.php">Contact</a></li>
            <li style="float:right"><a class="right-login" href="logout.php" > Logout </a></li>
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
             
 for($i=1; $i<=getNumRecords();$i++ )

            { if (getCategory($i)=="Reptile")
        
             {echo "<tr>";
            echo "<td>".getPname($i)."</td>";
            echo "<td>".getSname($i)."</td>";
            echo "<td>".getFamily($i)."</td>";
            echo "<td>".getOrigin($i)."</td>";
            echo "<td>".getStatus($i)."</td>";
            echo "<td>".getHabitate($i)."</td>";
            echo "<td>".getEnemies($i)."</td>";
            echo "<td>".getNourishment($i)."</td>";
            echo "<td>".getCategory($i)."</td>";
            echo '<td> <button class = "myBtn">More details</button></td>';
            echo "</tr>";

             ?>

                      <div id="myModal" class="modal">
            

            <!-- Modal content -->
                <div class="modal-content">
                     <div class="modal-header">
                         <span class="close">x</span>
                         <?php echo "<h1>".getPname($i)."</h1>"; ?>
                         <?php echo "<h4>Related Species:".getRelatives($i)."</h4>"; ?>
                         <?php echo "<h2>".getImage($i)."</h2>"; ?>                         
                    </div>
                 <div class="modal-body">
                    <?php echo "<p>".getDescription($i)."</p>"; ?> 
                    <?php echo "<p>Level of danger:".getDanger($i)."</p>"; ?>
                    <?php echo "<p>Enemies: ".getEnemies($i)."</p>"; ?>
                     <?php echo "<p>Can it be trained ? ".getTraining($i)."</p>"; ?>
                </div>
                <div class="modal-footer">
                     <?php echo "<h2>Scientific name: ".getSname($i)."</h2>"; ?> 
                </div>
                </div>

            </div>
<?php

        }  

     
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
    </script>
       <form action="xml_reptiles.php">
             <input type="submit" name="xml" value="Export as XML" onclick="xml.php" />
            </form>
            <form action = "export_reptiles.php">
             <input type="submit" name="json" value="Export as JSON" onclick="export_json.php" />
            </form>
    </body>
</html>