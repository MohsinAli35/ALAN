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

 <style>

.navbar-nav li a:hover {
            font-size: 20px;
            background-color: beige;
            padding: 3px;
               color: lightsalmon;

            }
            /* Change the link color on hover without modifying the entire navbar color scheme */
.navbar-nav .nav-link {
    color: darkslategray;
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
<body style="font-family:HelveticaArialGeorgia ;">
    <!-- navigation bar -->
<div class="container-fluid p-0">
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
            <img class="img-fluid "style="height: 30px;" src="author.png" alt=""
            data-toggle="modal" data-target="#myModal"   >              
                </a>
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
                
                <form action="userdb.php"class=""  method="POST">
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
</body></html>