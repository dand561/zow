<!DOCTYPE html>
<html>
  <head>
    <title>Simple search</title>
    <link rel="stylesheet" type="text/css" href="../html/css/delete.css">
    <link rel="stylesheet" type="text/css" href="../html/css/main.css" />
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
            <?php if(isset($_SESSION['loggedin'])) {echo "<li><a href=\"add_animal.php\">Add</a></li>";
             }?>
      </ul>
    </nav>

    <div class="form-wrapper cf">
      <form action="../application/delete_animal.php"  method="post">
          <input type="text" name="popular_name" placeholder="Search an animal" required>
          <button type="submit">Search</button>
      </form> 
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