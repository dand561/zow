<!DOCTYPE html>
<html>
<head>
<title>Zoo on Web</title>
    <link rel="stylesheet" type="text/css" href="../html/css/main.css"/>
	<?php
	session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
    
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "zowdatabase";

	try {
		$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
	} catch(PDOException $e){
		echo 'Connection failed'.$e->getMessage();
	}

	$connection = new mysqli($host, $user, $password, $dbname);

	if ($GLOBALS["connection"]->connect_error) {
	     die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}

	$stmt = $dbh->prepare("SELECT username, password FROM `users` WHERE username=:username AND password=:password");
	$stmt->execute(array(':username' => $username, ':password' => $password));

	$count = $stmt->rowCount();
	$results = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($count == 1){
		if (($results['username'] == $username) && ($results['password'] == $password)) {    
 				$_SESSION["loggedin"]='true';
	            

			if (isset($_POST['remember'])) {
	            /* Set cookie to last 1 hour */
	            
	            
	            $_SESSION["user"] = $results['username'];
	            $_SESSION["pass"] = $results['password'];

	            setcookie('username', $username, time()+3600, '/');
	            setcookie('password', $password, time()+3600, '/');
	        
	        } else {
	            /* Cookie expires when browser closes */
	            setcookie('username', $username, false, '/');
	            setcookie('password', $password, false, '/');
	        }
	        
	        header('Location: ../html/index.php');
		} else{
			echo 'Username/Password Invalid';
			header('Location: ../html/login.html');
		}
	} 

	mysqli_close($connection);
	?>

</head>

<body bgcolor="#E3E3E3">

    <nav id="navigation" class="clearfix">
      <ul>
        <li><a href="../html/index.html">Home</a></li>
        <li><a href="../html/search.html">Search</a></li>
        <li><a href="../html/categories.html">Categories</a></li>
        <li><a href="../html/contact.html">Contact</a></li>
        <li style="float:right"><a class="right-login" href="logout.php">Logout</a></li>
      </ul>
    </nav>



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