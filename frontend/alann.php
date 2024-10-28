
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitchen Accessories</title>
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
<link rel="icon" href="../img/logo.webp" >
 <style>

.navbar-nav li a:hover {
            font-size: 20px;
            background-color: beige;
            padding: 3px;
               color: lightsalmon;
               

            }
            /* Change the link color on hover without modifying the entire navbar color scheme */
.navbar-nav a {
    color: darkslategray;
    text-decoration:none;
}
.dish{
    display:flex; justify-content: center;margin-top: 5px;
}
.hed{
    display:flex; justify-content: center;
}
.white-bg {
            background-color: lightcyan;
        }
        .btn-link{color:grey}
        .custom-button {
    background-color:lightseagreen;
    color: white; 
    border: none;
  }
  .custom-button:hover {
    background-color: cyan; 
  }
</style>
</head>
<body >
    <!-- navigation bar -->
<div class="container-fluid">
<nav class="navbar navbar-expand-lg  white-bg text-dark ">

<a class="navbar-brand " href="#">
        <img src="../img/logo.webp" class="img-fluid" style="width:100px;">
      </a><button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto ">
        <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart"
                style="font-size:22px;color:brown" ></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Customers</a>
            </li>
            <li class="nav-item">
                <?php
               include('../connection/connect.php');
                
                $userimg = "SELECT * FROM `user` where U_ID = '38'";
                $runuser = $con->query($userimg);
                if($runuser->num_rows > 0 ){
                    while($usrow =$runuser->fetch_assoc()){
                        $Folder = $usrow['user_image'];
                        ?>
                        <?php 
                        echo"     <a class='nav-link' href='#'>
                        <img class='  'style='height: 36px; width: 36px;
                        border-radius:100%; 'src='$Folder' ;  
                        data-toggle='modal' data-target='#myModal'   >              
                            </a>";?><?php
                }

            }
    
                ?>
                 
           
            </li>
        </ul>
        <div class="modal " id="myModal">
          
        <div class="modal-dialog">
              <div class="modal-content"> 
                <!-- Modal Header -->
                <div class="modal-header ">
                  <h4 class="modal-title ">Sign Up</h4>
                  <button type="button" class="close text-danger " data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                
                <form action="../admin/userdb.php"  method="POST" enctype="multipart/form-data">
                    <div> <input type="file" name="uploadfile">

                <input type="submit" value="upload image" name="submit"><br>
            <?php
        
            ?></div>
  <div class="modal-content"><span><label for="" class="mt-4">Name:</label><br>
<input type="text" name="name"class="form-control "required></span></div>
<div class="modal-content"><span><label for="" class="mt-4" >Email:</label><br>
<input type="email" name="email"class="form-control"required></span></div>
<div class="modal-content"><span><label for="" class="mt-4" >Password:</label><br>
<input type="password" name="password" class="form-control"required></span></div><br>
<input type="submit" value="Sign Up"class="form-control  custom-button">
</form>
              </div>
        
              </div>
    </div>
    </div>
        

</nav>
</div>      
            
<!-- crousel starts -->

<div class="container-fluid " >
      <div class="col-lg-12 ">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active ">
              <img class="img-fluid" src="../img/b1.webp" width="100%">
            </div>
            <div class="carousel-item    ">


              <img src="../img/b2.webp" width="100%">
            </div>
   
            


        </div>
      </div>
    </div>
   </div>
<!-- latest product start -->
 <div class="conatainer-fluid">
  <div class="col-lg-12 my-5">
    <div class="container hed">
        <div>
<h3 id="latest" > latest Product</h3><p>
<small >Our Latest Item Collection of 2023</small></p></div></div>
<div class="col-lg-12">
    <div class="row">
    <?php
    include("../connection/connect.php");
    
            $getpdata =  "SELECT * FROM products WHERE title = 'Feature ' OR title = 'Latest Product' ORDER BY product_id DESC";
                       $drun  = $con->query($getpdata);

            if($drun->num_rows > 0){

                while ($drow1 = $drun->fetch_assoc()){
                  
                $productid = $drow1["product_id"];
                $folder = $drow1["product_image"];
             
            ?>
        <div class="col-lg-3" >

        <a href="../frontend/alan-product-detail.php?productid=<?php echo $productid; ?>">
        <?php echo "<img src='$folder ' ; width='250px'; height='250px'>";?></a>

                      
                <h6 class="dish"> $ <?php echo $product_price = $drow1['product_price'];?>
 </h6>
            </div>
           
            <?php
               }
            }

                    ?>
            </div>
            
                         </div>
                         </div>
            </div>
  </div>

        <!--latest product end  -->
            <!-- category menu bar start  -->
               
            <div id="menu-bar">
    <div class="container">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="col-md-12">
                <div class="text-center m-2">
                    <h5>
                        All categories
                    </h5>
                </div>
                <?php 
                include("../connection/connect.php");

                $categ = "SELECT * FROM categories WHERE ID > 0 "; 
                $run = mysqli_query($con, $categ) or die("QUERY Failed. :categories");

                if ($run->num_rows > 0) {
                    $rows = $run->fetch_all(MYSQLI_ASSOC);
                ?>
                <ul class="navbar-nav d-flex justify-content-between">
                    <?php
                    foreach ($rows as $row) {
                        $ct_id = $row["ID"];
                        $c_t = $row["title"];
                    ?>
                    <li class='nav-items'>
                        <?php echo "<a href='../admin/alancateg.php?catid=$ct_id'>$c_t</a>";?>
                    </li>
                    
                    <?php } ?>
                </ul>
                <?php }?>
            </div>
        </div>
    </div>
</div>
                <!-- category menu bar end -->

 

        <div class="container-fluid"> 
        <div class="col-lg-12 ">
            <div class="row   ">
            <div class="col-lg-6 mb-2">
                    <img src="../img/seven.webp" alt="" width="100%"  >
                </div>
                <div class="col-lg-6 ">
                    <img src="../img/seven.webp" alt="" width="100%"  >
                </div>    
            
            </div>
        </div>
        </div>
        <!-- feauters product -->

        <div class="conatainer-fluid">
  <div class="col-lg-12 my-5">
    <div class="container hed">
        <div>
<h3 > Featured Product</h3><p>
<small >Best selling item in our collection</small></p></div></div>


<div class="row">
    <?php
   
            $getpdata =  "SELECT * FROM `products`  where title ='Feature 'ORDER BY product_id DESC";
            $drun  = $con->query($getpdata);

            if($drun->num_rows > 0){

                while ($drow1 = $drun->fetch_assoc()){
                  
                $productid = $drow1["product_id"];
                $folder = $drow1["product_image"];
             
            ?>
        <div class="col-lg-3">

        <a href="alan-product-detail.php?productid=<?php echo $productid; ?>">
        <?php echo "<img src='$folder ' ; width='250px'; height='250px' >";?></a>

                      
                <h6 class="dish"> $ <?php echo $product_price = $drow1['product_price'];?>
 </h6>
            </div>
           
            <?php
               }
            }

                    ?>


            </div>
            
   </div> 
</div>
<!-- <div class="container mt-4 mb-4">
    <div class="row"> -->
        <?php 
        // $getdata = "SELECT * FROM `admin`";
        // $run =$con->query($getdata);
        // if($run->num_rows > 0){

        //     while($row1 = $run->fetch_assoc()){
        //     $email = $row1["Email"];
        //     $admin_id = $row1["ID"];
            
        ?>
        <!-- <div class="col-lg-3"><a href="alan-product-detail.php?admin_det_id=<?php echo $admin_id ; ?>"><?php echo "$email";?></a></div> -->
        <!-- <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div> -->
        <?php
        //     }
        // }
        ?>
    <!-- </div>
</div> -->
                        <!-- blogs start -->
                        <div class="container-fluid">
                         <div class="col-lg-12">
                            <div class="container hed">
                            <div>
                                <h3>New Blogs</h3>
                                <p class="text-secondary">
                                Follow our blog for collect information  
                                </p>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                                <img src="../img/b1.webp" alt="blog" width="100%">
                                <p>
                   <strong> <i>There are many variations of passages
January 26, 2021 / Demo Alan Admin</strong>
to popular belief, Lorem Ipsum is not simply random text. 
It has roots in a piece of classical Latin literature from 45 BC, making 
it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the... to 
 belief, Lorem Ipsum is not simply random text. It has roots in a piece
  of classical Latin literature from 45 BC, making it over 2000 years old.
   Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
    looked up one of the...

    <b>____Read More!</b></i>                            
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <img src="../img/b4.webp" alt="blog" width="100%">
                                <p>
                   <strong><i> There are many variations of passages
January 26, 2021 / Demo Alan Admin </strong>
to popular belief, Lorem Ipsum is not simply random text. 
It has roots in a piece of classical Latin literature from 45 BC, making 
it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the... to 
 belief, Lorem Ipsum is not simply random text. It has roots in a piece
  of classical Latin literature from 45 BC, making it over 2000 years old.
   Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
    looked up one of the...

    <b>____Read More!</b></i>                            
                                </p>
                            </div>
                            </div>
                    </div>
                </div>
                <!-- contact form start -->
                <div class="container-fluid ">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-6"style="background-color:lightcyan">
                            <!-- <img src="img/six.webp" alt=""> -->
                            <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Contact Us</h1>
                        </div>
                        <p class="mb-4"> Have questions or need assistance? Reach out to our dedicated customer support team. We're here to address your inquiries, provide technical support, and offer personalized recommendations based on your security requirements.</p>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <label for="name">Your Name</label>

                                        <input type="text" class="form-control" id="name" placeholder=" Name"name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <label for="email">Your Email</label>  
                                                         </div>

                                        <input type="email" class="form-control" id="email" placeholder=" Email"name="email" required>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">   
                                           <label for="subject">Subject</label>

                                        <input type="text" class="form-control" id="subject" placeholder="Subject"name="subject"required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                    <label for="message">Message</label>

                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 100px" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 my-3" type="submit">Send Message</button>
                                </div>
                                <div>
                                    <?php
                                    include("../connection/connect.php");
         if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql ="INSERT INTO CONTACT (Name ,Email, Subject, Message) VALUES ('$name','$email','$subject','$message')";
    if (mysqli_query($con, $sql)) {
        echo "";
    } else {
        echo "Not successfully " . $sql . "<br>" . $con->error;
    }
}
$con->close();
                                    ?>
                                </div>
                            </div>
                        </form>
                           </div>
                       <div class="col-lg-6 ">
                        
                       <img src="img/b3.webp" alt="" class="img-fluid h-100">
                       </div>
                        </div>
                    </div>
                </div>
                  <hr>
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