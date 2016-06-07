<!DOCTYPE html>
<html>
    <head>
        <title>Categories</title>
        <link rel="stylesheet" type="text/css" href="css/categories.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
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

    <div class="wrapper">
      <div id="container" class="clear">
        <div id="categories">
          <section id="big_categories" class="clear">

            <article class="one_third">
              <figure>
                <a href="birds.php">
                    <img src="images/birds.jpg" alt="Birds" width="290" height="180">
                </a>
                <figcaption>
                  <h2>Birds</h2>
                  <p></p>
                </figcaption>
              </figure>
            </article>

            <article class="one_third">
              <figure>
                <a href="mammals.php">
                    <img src="images/mammals.jpg" alt="Mammals" width="290" height="180">
                </a>
                <figcaption>
                  <h2>Mammals</h2>
                  <p></p>
                </figcaption>
              </figure>
            </article>

            <article class="one_third lastbox">
              <figure>
                <a href="reptiles.php">
                    <img src="images/reptiles.jpg" alt="Reptiles" width="290" height="180">
                </a>
                <figcaption>
                  <h2>Reptiles</h2>
                  <p></p>
                </figcaption>
              </figure>
            </article>

          </section>

        </div>
      </div>
    </div>
      <form class="import" method="post" action="import_xml.php" enctype="multipart/form-data">
              <input type="file" name="fileToUpload" id="fileToUpload" value="fileToUpload">
               <input type="submit" name="submit" value="Import as XML" />
           </form>


              <form class="import" method="post" action="import_json.php" enctype="multipart/form-data">
                  <input type="file" name="fileToUpload2" id="fileToUpload2" value="fileToUpload">
                  <input type="submit" name="submit2" value="Import as JSON" />
            </form>

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
