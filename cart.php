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
	<title>Shop Cart</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" type="text/css" href="css/main.css">
           <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" type="text/css" href="https://kit.fontawesome.com/a076d05399.js">
           <script src="https://kit.fontawesome.com/a076d05399.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>
    <!-- Navigation -->
    <div class="header-logo">
      <a href="index.php"><img src="images/Bitmap.png"></a>
      
  </div>
    <nav class="navbar-top">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="pages/farmer.php">Farmer</a>
    <a href="pages/cosmetics.php">Cosmetics</a>
    <a href="pages/about.php">About</a>
  </div>
  <div class="navbar-desk">
     <a href="index.php">Home</a>
    <a href="pages/farmer.php">Farmer</a>
    <a href="pages/cosmetics.php">Cosmetics</a>
    <a href="pages/about.php">About</a>
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
        <i class="fas fa-shopping-cart" style="font-size:26px;float:right;padding:10px;"><sup></sup></i>
      </span>
    <span class="spanicon userbtn" style="font-size:30px;cursor:pointer;color: black;" onclick="openUser()"><i class='far fa-user' style='font-size:26px;float:right;'></i></span>

  </div>
  </nav>
	<h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
                <script src="js/script.js" type="text/javascript">
             
           </script>
</body>
</html>