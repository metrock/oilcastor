<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "test");
 if(isset($_POST["add_to_cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="index.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="index.php"</script>';
                }
           }
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>About</title>
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" type="text/css" href="../css/main.css">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
           <script src="https://kit.fontawesome.com/a076d05399.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>

        <!-- Navigation -->
    <div class="header-logo">
      <a href="../index.php"><img src="../images/Bitmap.png"></a>

  </div>
    <nav class="navbar-top">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="../index.php">Home</a>
    <a href="farmer.php">Farmer</a>
    <a href="cosmetics.php">Cosmetics</a>
    <a href="about.php">About</a>
  </div>
  <div class="navbar-desk">
    <a href="../index.php">Home</a>
    <a href="farmer.php">Farmer</a>
    <a href="cosmetics.php">Cosmetics</a>
    <a href="about.php">About</a>
  </div>
  <div id="myUsernav" class="usernav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeUser()">&times;</a>
    <a href="#">Log In</a>
  </div>
  <div class="left-icons">
    <span class="spanicon menubtn" style="font-size:30px;cursor:pointer;" onclick="openNav()"><i class="fa fa-bars" style='font-size:26px;color: black;'></i></span>
    <span class="spanicon chatbtn" style="font-size:30px;cursor:pointer" onclick="dropChat()"><i class='fas fa-comment-alt' style='font-size:24px'></i></span>
  </div>

  <div class="right-icons">
        <span class="spanicon">
          <a href="../cart.php"><i class="fas fa-shopping-cart" style="font-size:26px;float:right;padding:15px 10px;"><sup></sup></i></a>

      </span>
    <span class="spanicon userbtn" style="font-size:30px;cursor:pointer;color: black;" onclick="openUser()"><i class='far fa-user' style='font-size:26px;float:right;'></i></span>

  </div>
  </nav>


           <br />
           <div class="banner">
    <h2>About Us</h2>
    <ul class="page-title">
        <li><a href="#">Home |</a></li>
        <li><a href="#">About</a></li>
        </ul>
  </div>
  <!-- About Section -->
  <div class="about">
    <div class="w3-row w3-padding-64" id="about">
      <div class="w3-col m6 w3-padding-large">
        <!-- Photo by Edgar Castrejon on Unsplash -->
       <img src="../images/4.jpg" class="w3-round w3-img w3-opacity-min" alt="Table Setting" width="400" height="450">
      </div>

      <div class="w3-col m6 w3-padding-large">
        <h2 class="w3-center">About OilCaster</h2><br>
        <p class="w3-large">Supplying castor seeds and castor oil. We have the highest grade castor bean in Africa. We convert castor oil into bio-diesel, for our farmers.
        <h3 class="w3-center">Company Overview</h3><br>
        <p class="w3-large w3-text-grey w3-hide-medium">Started in 1995 SSC LTD. Registered in Alberta Canada, Operating in Mozambique, Botswana, South Africa, Brazil and Zimbabwe</p>
        <h4 class="w3-center">Products</h4><br>
        <p class="w3-large w3-text-grey w3-hide-medium">castor beans, castor seeds, castor oil, bio diesel</p>
      </div>
    </div>

    <!-- our team -->
    <div class="row">
    <div class="column">
      <div class="card">
        <img src="../images/me.png" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Name</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>example@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../images/me.png" alt="Mike" style="width:100%">
        <div class="container">
          <h2>Name</h2>
          <p class="title">Director</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>example@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../images/me.png" alt="Mike" style="width:100%">
        <div class="container">
          <h2>Name</h2>
          <p class="title">Director</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>example@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../images/me.png" alt="John" style="width:100%">
        <div class="container">
          <h2>Name</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>example@example.com</p>
        </div>
      </div>
    </div>
  </div>

  </div>

           <br />
           <!-- contact -->
    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="xbtn" onclick="upChat()">&times;</a>
      <div class="overlay-content">
        <section class="contact-form-area">
          <div class="center">
            <h3 class="heading">Contact Us</h3>
            <p class="nospace">Send us an email for more information</p>
          </div>
              <form id="myForm" action="mail.php" method="post" class="contact-form">
                <div class="rowform">
                  <div class="col-form-5">
                    <input type="text" name="fname" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mt-20" required>
                  </div>
                  <div class="col-form-5">
                    <input type="email" name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mt-20" required>
                  </div>
                  <div class="col-form-10">
                    <textarea class="common-textarea mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
                  </div>
                  <div class="col-form-10 d-flex justify-content-end">
                    <button class="primary-btn submit-btn d-inline-flex align-items-center mt-20"><span class="mr-10">Send Message</span><span class="lnr lnr-arrow-right"></span></button> <br>
                    <div class="alert-msg"></div>
                  </div>
                </div>
              </form>
          </section>
      </div>
    </div>

    <footer class="page-footer">

      <!-- Grid row-->
      <div class="icons-layer">

        <!-- Grid column -->

          <h6>Get connected with us on social networks!</h6>

        <!-- Grid column -->

        <!-- Grid column -->
        <div class="icons">
          <a href="#" class="fab fa-facebook" title="Facebook Page"></a>
          <a href="#" class="fab fa-twitter" title="Twitter Account"></a>
          <a href="#" class="fab fa-google" title="Google Account"></a>
          <a href="#" class="fab fa-youtube" title="Youtube Channel"></a>
          <a href="#" class="fab fa-instagram" title="Instagram Account"></a>
        </div>
        <!-- Grid column -->

  </div>

  <!-- Footer Links -->
  <div id="contact" class="footer-info">

    <!-- Grid row -->
    <div class="row-footer">


      <!-- Grid column -->
      <div class="col-mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
        <p>
          <a href="#!">Link</a>
        </p>
        <p>
          <a href="#!">Link</a>
        </p>
        <p>
          <a href="#!">Link</a>
        </p>
        <p>
          <a href="#!">Link</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Navigation</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
        <p>
          <a href="#">Link</a>
        </p>
        <p>
          <a href="#">Link</a>
        </p>
        <p>
          <a href="#">Link</a>
        </p>
        <p>
          <a href="#">Link</a>
        </p>

      </div>

      <div class="col-mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Address</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
        <p>
          Number
        </p>
        <p>
          Street
        </p>
        <p>
          City
        </p>
        <p>
          Map
        </p>

      </div>

      <div class="col-mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
        <p>
          Number
        </p>
        <p>
          Number
        </p>
        <p>
          Email
        </p>
        <p>
          Email
        </p>

      </div>

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    <p>&copy 2019:<a href="#"> OilCastor.com</a> | Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></p>

  </div>
  <!-- Copyright -->

</footer>
  <!-- Marshall Chikari -->
           <script src="../js/script.js" type="text/javascript">

           </script>
      </body>
 </html>
