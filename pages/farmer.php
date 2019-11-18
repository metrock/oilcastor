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
           <title>Farmer</title>
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="../css/main.css">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://kit.fontawesome.com/a076d05399.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  

        <!-- Navigation -->
    <div class="header-logo farmer-header">
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

<div class="masthead responsive-image" style="background-image: url(../images/5.jpg);">
   <header class="entry-header">
      <h1 class="entry-title">Heading Spaced with padding</h1>
      <h2 class="entry-subtitle">Some random supporting title</h2>
    </header>
  </div>
<div class="content">
    <h3>About Farming</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
           
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