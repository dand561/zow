<!DOCTYPE html>
<html>
  <head>
    <title>Simple search</title>
    <link rel="stylesheet" type="text/css" href="css/simple_search.css">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
     <script>
         function showResult(str) {
      
            if (str.length == 0) {
               document.getElementById("livesearch").innerHTML = "";
               document.getElementById("livesearch").style.border = "0px";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
        
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                  document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
               }
            }
            
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
         }
      </script> 
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

    <div class="form-wrapper cf">
      <form action="../application/simple_srch.php"  method="post">
          <input type="text" name="popular_name" placeholder="Search an animal" onkeyup = "showResult(this.value)" size = "30" required>
          <div id = "livesearch"></div>
          <button type="submit">Search</button>
      </form> 
    </div>

    <div class="advanced">
      <form action="advanced_search.html" method="post" class="advanced">
          <button type="submit">Advanced</button>
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