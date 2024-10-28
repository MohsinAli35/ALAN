<?php
session_start();
$cart = $_SESSION['cart']

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
  
    ul li{
        list-style: none;margin:4px;    
    }
    ul li a{
        color:black;
    }
    a{
        text-decoration: none !important;
    }
    .p_img{
        height: 80px;width: 80px;
    }
</style>
</head>
<body>
<?php 
 include('header.php');
    ?>
    <div class="container-fluid">
        <div class="col-lg-12 my-5">
            <div class="row">
                <div class="col-lg-7 ">
                    <div class="container col-lg-8">
                    <ul class="row">
                        <li><a href="../frontend/alan-product-detail.php">Cart</a> <i class="fa fa-angle-right"></i></li>
                        <li><a href="../frontend/alann.php">Home</a> <i class="fa fa-angle-right"></i></li>
                        <li><a href="">Info</a> </li>
                    </ul>
                    <h4 class="mb-3 mt-4" >Contact information</h4>
                    <form action="#">
                        <div class="row" >
                            <div class="col-lg-6" >
                        <label for="first name ">First Name:</label><br>
                        <input class="form-control" type="text"name="first_name"></div>
                        <div class="col-lg-6">
                        <label for="first name ">Last Name:</label><br>
                        <input class="form-control " type="text"name="last_name"></div></div>
                        <div class="col-lg-12 p-0 my-2">
                        <label for="address ">Address:</label><br>
                        <input class="form-control " type="text"name="address"></div>
                        <div class="col-lg-12 p-0 my-2">
                        <label for="Number">Mobile #:</label><br>
                        <input class="form-control " type="number"name="phone"></div>
                    </form>
                    </div>
                </div>
              <div class="col-lg-5">
    <div class="jumbotron container">
        <?php
        foreach ($cart as $key => $value) {
            $quantity = $value['quantity'];

            include("../connection/connect.php");
            if (isset($_GET['productid']));
            $id = $_GET['productid'];
            $check_q = "SELECT * FROM `products` WHERE product_id = '$key'";
            $runcheck_q = $con->query($check_q);
            if ($runcheck_q->num_rows > 0) {
                while ($row = $runcheck_q->fetch_assoc()) {
                    $folder = $row['product_image'];
                    $p_name = $row['product_name'];
                    $p_price = $row['product_price'];
                    $cat = $row['title'];
        ?>
                    <div class="row pl-0">
                        <div class="col-lg-3 my-3">
                            <img src="<?php echo "$folder"; ?>" class="p_img  rounded-circle ">
                        </div>
                        <div class="col-lg-7 my-3">
                            <span><p><?php echo "$p_name"; ?> </p>
                                <small> Category:<?php echo "$cat"; ?> </small>
                            </span>
                        </div>
                        <div class="col-lg-2 my-3">
                            <small> $<?php echo "$p_price"; ?> </small>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

            </div>
        </div>
    </div>
</body>
</html>