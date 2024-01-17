<!--php session start-->
<?php
  session_start();
  session_destroy();
?>
<!--php session end-->

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Styles -->
    <link rel="stylesheet" href="./css/style.css" />

    <title>Sandamadala Products</title>
    
  </head>

  <body>

    <main>
      <div class="big-wrapper light">
        <img src="./images/shape.png" alt="" class="shape" />
          <header>
            <div class="container">
              <div class="logo">
                <img src="./images/logo.png" alt="Logo" />
                <h3>Sandamadala Products</h3>
              </div>
              <!--Hamburger menu start-->
              <div class="links">
                <ul>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Contact us</a></li>
                  <li><a href="http://localhost/Sandamadala%20Products/membership/index.php" class="btn">Sign up</a></li>
                </ul>
              </div>
              <!--Hamburger menu end-->
              <div class="overlay"></div>
            </div>
          </header>

          <div class="showcase-area">
            <div class="container">
              <div class="left">
                <div class="big-title">
                  <h1>Experience the spices.</h1>
                </div>
                <p class="text">
                  Sandamadala Products is a rising company that manufactures, processes and distributes qulity spice products...
                </p>
                <ul>
                  <li>
                    <a href="http://localhost/Sandamadala%20Products/signup/" class="btn">Place your order here</a>
                  </li>
                </ul>
              </div>

              <div class="right">
                <img src="./images/person.png" alt="Person Image" class="person" />
              </div>
            </div>
          </div>
      </div>
    </main>

  </body>
</html>
