<?php include  ('../header/header.php') ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Product details</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
  <style>
   h3{
    font-size: 25px;font-family: sfantasy ;
   }
           .btn-link{color:grey}

  </style>

            </head>
        
            <body>
            <?php
                        include("../connection/connect.php");
                        if (isset($_GET['productid']));
                        $id = $_GET['productid']; 
                $getdata = "SELECT * FROM `products` WHERE product_id='$id'";
                $run =$con->query($getdata);
                if($run->num_rows > 0){
        
                    while($row1 = $run->fetch_assoc()){
                        $product_name = $row1['product_name'];
                        $p_cat = $row1['title'];
                        $product_size = $row1['product_size'];
                        $product_quality = $row1['product_quality'];
                        $product_brand = $row1['product_brand'];
                        $product_description = $row1['product_description'];
                        $product_price = $row1['product_price'];
                        $product_stock = $row1['product_stock'];
                        $folder =  $row1['product_image'];
                      
                  
                   ?>
                             
                 <?php 
                    }}
                ?>


            <div class="container-fluid ">
                <div class="col-lg-12" >
                    <div class="row " >
                        <div class="col-lg-12 mt-3  ">
                            <?php
                            include('../connection/connect.php');
                            $latest_count_query = "SELECT COUNT(*) as latest_count FROM products WHERE title = '$p_cat' ";
                            $latest_result = $con->query($latest_count_query);
                            $latest_count = $latest_result->fetch_assoc()['latest_count'];
                            
                            ?>
                            <h3><?php echo" $p_cat best quality <span  class='text-danger'>$product_name </span>";?></h3>
                            <p> <?php echo "$latest_count  items found for $p_cat  "?>.</p>
                        </div>
                        <div class="col-lg-6 mt-3 "style=" display:flex ;justify-content:center ; align-items:; height:100vh;" >
                        <?php   echo "<img src='$folder' width='80%'; height='480px'>";?>

                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="mt-3" >
                                <form action="../cart/cart.php" method="POST" enctype="multipart/form-data" >

                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <h3 class="text-danger" >
                                            <!-- Name -->
                                    <?php 

                                        if (isset($product_name)) {
                                            echo $product_name;
                                        }    
?>
                                        </h3></div>
                                        <div class="col-lg-6">
                                        <h3>
                                      
                                        Size:

                                        </h3>
            
                <select name="product_size" class="form-select border-info" style="height: 55px; width: 40%" >
                    <option selected>  <?php 
                                                                echo $product_size;
                                        ?></option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
                                            </div>   
                                      </div>
                                </div>
                                    

                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                    <div class="col-lg-6"> 
                                    <h3>
                                     Qualities:

                                   
                                    </h3>
            
            <select name="product_quality" class="form-select border-info" style="height: 55px; width: 48%">
                <option selected> <?php echo $product_quality;?></option>
                <option value="Steel">Steel</option>
                <option value="MagnetSteel">Magnet Steel</option>
            </select>
                                </div>
                                    <div class="col-lg-6">
                                    <h5>
                                        Brand:
                                       <br><small class="text-info"> <?php echo $product_brand;?></small>
                                    </h5>

                                    </div>
                                   
                                </div></div>
                                 
                                
                                </div> 
                                   <div class="col-lg-12"> <h3><p>
                                    Price:
                                    <br><small class="text-info" >  $<?php echo $product_price?> </small>
                                </p></h3></div>
                                <div class="col-lg-12" ><h5>
                  Description:
                  <br><small class=" text-dark"><?php echo $product_description?></small>

                                   </h5>
                               <br> 
                               
                                </form>

                                
                            </div>
                            <form action="../cart/viewcart.php" method="GET">
                               <div class="row">
                                <div class="col-lg-6">
                                    <div class="col-6 my-2">
                                        <input type="hidden" value="<?php echo $id;?>" name="productid">
                                    <input class="form-control" type="number" min="1" name="quantity" value="1"  >
                                    </div>   
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn" type="submit"   style="height: 60px; width: 40%; background-color:cyan ">
                                       Add to Cart 
                                    </button>
                                </div>
                                </div>
                               </form>
                        </div>
                    </div>
                </div>
            </div>
              
                                 <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fa fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fa fa-youtube "></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Business Security</a>
                    <a class="btn btn-link" href="">Fire Detection</a>
                    <a class="btn btn-link" href="">Alarm Systems</a>
                    <a class="btn btn-link" href="">CCTV & Video</a>
                    <a class="btn btn-link" href="">Smart Home</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Footer End -->
   
            </body>
            </html>
