<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details </title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fontawesome.com/v5/icons/edit?f=classic&s=light&an=spin">
<style>
  .nav-menu{
    padding-left:0px;
  }
  .nav-menu li{
    list-style: none;margin-bottom: 10px;
  }
   .widget-contact-info li{
    list-style: none;margin-bottom: 10px;
  }
ul li a {
text-decoration: none ; color:black;
}
ul  a {
text-decoration: none ; color:black;
}
tr .image{
width: 10%;
}
td{
vertical-align: middle!important; text-align: center;
}
tr th{
justify-content: center;text-align: center;

}
.quantity-control{
  border: 1px solid black;
}
.pagination{
  justify-content: center;text-align: center;
}
ul li .page-link{
color:black;
}
</style>
</head>
<body>
    <?php
      session_start();
      $cartarr = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
      // $cartarr = $_SESSION['cart']; 
  
      // var_dump($cartarr);
      if (isset($_GET['action']) && $_GET['action'] == 'clear_cart') {
        unset($_SESSION['cart']);  // Clear the cart session
        
        // Redirect back to the referring page or the cart page
        header("Location: " . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'cart.php'));
        exit();
    }
    
    // Display message if cart is empty
    if (empty($cartarr)) {
        echo "<p>Your cart is empty.</p>";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['productid'])) {
      $p_remove = $_GET['productid'];
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $p_remove) {
            unset($_SESSION['cart'][$key]);  // Remove item from the cart array
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array to prevent gaps
            break;
        }
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
      header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
      header("Location: cart.php");  // Fallback to cart page if referer is not set
    }
    exit();
    
  }
  
 // to remove the whole cart from session

//  if(isset($_GET['action']) && $_GET['action'] == 'clear_cart'){
//   unset($_SESSION['cart']);
//   if (isset($_SERVER['HTTP_REFERER'])) {
//     header("Location: " . $_SERVER['HTTP_REFERER']);
//   } else {
//     header("Location: cart.php");  // Fallback to cart page if referer is not set
//   }
//   exit();
  
  // header("Location: cart.php");  // Redirect back to cart page or any page


  include("header.php");

    ?>
    <div class="container-fluid " >
        <img src="../img/b2.webp" class="img-fluid w-100" style="height: 400px;"alt="b2">
    </div>
    <div class="container">
    <table class="  table table-responsive-sm table-bordered my-5 ">
    <thead>
      <tr class="table_row">
        <th class="image">Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Remove</th>
      </tr>
    </thead>
    <?php 
foreach($cartarr as $key => $value){
  $quantity = $value['quantity'];
  $productId = $value['id']; 
      include('../connection/connect.php');
      $cartq = "SELECT * FROM `products` WHERE product_id = '$productId' ";
      $cartresult = $con->query($cartq);
      if($cartresult->num_rows > 0){
          while($cartrow = $cartresult->fetch_assoc()){
              $folder = $cartrow['product_image'];
              $p_price = $cartrow['product_price'];
              $p_name = $cartrow['product_name'];
?>
      <tbody>
          <tr>
              <form action="cart.php">
                  <td><img  style=" height: 100px; width: 100px;" src="<?php echo $folder ;?>" ></td>
                  <td><?php echo"$p_name"?></td>
                  <td>
                      <?php echo "$p_price"?>
                  </td>
                  <td>
                      <?php  echo "$quantity "; ?>
                  </td>
                  <td>
                      <?php 
                          $total_price = $p_price * $quantity ;
                          echo "$"   . $total_price;
                      ?>
                  </td>
                  <td><a href="cart.php?action=remove&productid=<?php echo $productId; ?>" class="fa fa-remove text-dark"></a></td>
              </form>
          </tr>
      </tbody>
<?php
          }
      }
  }

    ?>
    </table>
    </div>
    <!-- continue button start -->
    <div class="col-lg-12">
        <div class="container">
        <div class="row">
        <div class="col-lg-8">

         <button type="submit" class="btn "style="height: 60px; background-color:lightcyan">
           <a href="../cart/cart.php?action=clear_cart" class="text-decoration-none text-dark" >   Clear Cart </a>
             
            </button>
            
         <button type="submit" class="btn"style="height: 60px; background-color:cyan ">
          <a href="../frontend/alann.php" class="text-decoration-none text-dark" >  continue shopping </a>
            </button>
     </div>
     <div class="col-lg-4">
         <button type="submit" class="btn"style="height: 60px; ; background-color:cyan ">
          <a href="../cart/checkout.php?productid=<?php echo"$key" ?>" class="text-decoration-none text-dark" >  Check out </a>
            </button>
                </div>
        </div>
        </div>
    </div>
    <!-- button end -->
    <div class="jumbotron my-5">
    <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">About Information</h4>
              <div class="about-widget">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud reprhendit in voluptate velit esse exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item widget-menu-item">
              <h4 class="widget-title">Information</h4>
              <nav class="widget-menu-wrap">
                <ul class="nav-menu ">
                  <li><a href="shop-account.html">My Account</a></li>
                  <li><a href="shop-wishlist.html">Wishlist</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="blog.html">Blog</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">Quick Links</h4>
              <nav class="widget-menu-wrap">
                <ul class="nav-menu ">
                  <li><a href="#/">Shipping policy</a></li>
                  <li><a href="#/">Size Chart</a></li>
                  <li><a href="#/">Login</a></li>
                  <li><a href="#/">My Account</a></li>
                  <li><a href="#/">Register</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">Contact Us</h4>
              <p class="mb-2">Your current address goes to here,120 example, country.</p>
              <ul class="widget-contact-info">
                <li class="info-phone"><a href="tel://(008)25425425425487">(008) 254 254 254 25487</a></li>
                <li class="info-mail"><a href="mailto://example@admin.com">example@admin.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>
</body>
</html>