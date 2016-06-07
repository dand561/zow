<?php
    session_start();
    
    ?>
    <!DOCTYPE html>
<html>
<head>
<title>Zoo on Web</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body bgcolor="#E3E3E3">

<?php if (isset($_SESSION['loggedin']))
{

echo"
    <nav id=\"navigation\" class=\"clearfix\">
      <ul>
        <li><a href=\"index.php\">Home</a></li>
        <li><a href=\"search.php\">Search</a></li>
        <li><a href=\"categories.php\">Categories</a></li>
        <li><a href=\"contact.php\">Contact</a></li>
        <li><a href=\"add_animal.php\">Add</a></li>
       <li><a href=\"delete.php\">Delete</a></li>

        <li style=\"float:right\"><a class=\"right-login\" href=\"../html/logout.php\">Logout</a></li>
       
      </ul>
    </nav>
    ";
}

    else
{echo "
    <nav id=\"navigation\" class=\"clearfix\">
      <ul>
        <li><a href=\"index.php\">Home</a></li>
        <li><a href=\"search.php\">Search</a></li>
        <li><a href=\"categories.php\">Categories</a></li>
        <li><a href=\"contact.php\">Contact</a></li>
       
        <li style=\"float:right\"><a class=\"right-login\" href=\"../html/login.html\">Login</a></li>
      </ul>
    </nav>
    ";
}
    ?>

    <div>
        <h1> Welcome to our zoo!</h1>
        <article>
            
        </article>
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
