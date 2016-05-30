<!DOCTYPE html>
<html>
<head>
<title>Zoo on Web</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
     <link rel="stylesheet" type="text/css" href="table.css"/>
</head>

<body bgcolor="#E3E3E3">

    <nav id="navigation" class="clearfix">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="search.html">Search</a></li>
        <li><a href="categories.html">Categories</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="buy_ticket.html">Buy ticket</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li style="float:right"><a class="right-login" href="#">Login</a></li>
      </ul>
    </nav>



    <div id = "main">
<?php
define('DB_NAME', 'zowdatabase');
define('DB_USER', 'drgmrsc');
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
if(isset($_POST['popular_name'])){
    $mammals = $_POST['popular_name'];
    $mammals = $_POST['scientific_name'];
    $mammals = $_POST['category'];
    $mammals = $_POST['family'];
    $mammals = $_POST['description'];
    $mammals = $_POST['origin'];
    $mammals = $_POST['status'];
    $mammals = $_POST['climate'];
    $mammals = $_POST['habitate'];
}

$sql_query = "SELECT * FROM `animals` WHERE category LIKE 'mammals'";
//$sql_query = "SELECT * FROM `animals` WHERE popular_name LIKE 'LION'";
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
    </div>


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

</body>
</html>
