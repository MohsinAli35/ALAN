<?php include('../header/header.php');
   include('../connection/connect.php');
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="blogs.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
<style>
    .dish{
    display:flex; justify-content: center;
}
.navbar{
    background-color: lightcyan;
}

ul li  {
    text-decoration:none;
    list-style: none;   
}
ul li a{
    color:black;font-size: 18px;
}
ul li a:hover{
    text-decoration: none;
    color:sienna;padding:9px;font-size: 18px;
    background-color:;
}
.active-category {
        background-color: skyblue;  padding: 8px;font-size: 18px;

    }
</style>
</head>
<body>
    <!-- show categories start -->
    <div class="container-fluid my-3">
    <div id="menu-bar">
                    <div class="container-fluid ">
                        <div class="navbar navbar-expand-lg navbar-light    ">
                            <div class="col-lg-12 ">
                               <?php 
                               include("../connection/connect.php");
                              
                               $categ = "SELECT * FROM categories WHERE ID > 0 "; 
                               $run = mysqli_query($con,$categ) 
                               or die("QUERY Failed. :categories");

                               if($run->num_rows > 0)   {
                                  

                               ?>
                                <ul class=" d-flex justify-content-between mb-0 ">
                                    <?php
                                     while($row = $run->fetch_assoc()){
                                     $ct_id = $row["ID"];
                                     $c_t = $row["title"];
                                     $activeClass = (isset($_GET['catid']) && $_GET['catid'] == $ct_id) ? 'active-category' : '';
                                     ?>
                                       <li class=" <?php echo $activeClass; ?>" >
                                  <?php  echo " 
                                    <a href='../admin/alancateg.php?catid={$ct_id}'>
                                    $c_t
                                     </a>";?>
                                     </li>
                                    
                                        <?php }?>

                                </ul>
                                <?php }?>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- categories ended -->
<div class="col-lg-12 my-4">
                            <div class="row">
 
<?php
    if(isset($_GET['catid'])){
        $catid = $_GET['catid'];
        $showcat= "SELECT * from `products` where  cat_id= '$catid'";
        $run_q = $con->query($showcat);
        if($run_q->num_rows ){
            while($showrow = $run_q->fetch_assoc()){
                $productid = $showrow["product_id"];
                $productname = $showrow["title"];
                $productprice = $showrow["product_price"];
                $folder = $showrow["product_image"];
                ?>
                    
                                <div class="col-lg-3">
                                <a href="../frontend/alan-product-detail.php?productid=<?php echo $productid; ?>">                   
                                    <?php echo"<img src='$folder'  width='250px'; height='250px';>";?></a>
                                    <h6 class="dish"> Rs: <?php echo"$productprice" ?></h6>
                                </div>
                    
                <?php

              
            }
        }


    }
    ?>
        </div>
                </div>
                </div>
                
</body>

</html>