<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboarb</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">

</head>

<style>
        .height {
            list-style: none;background-color: lightgoldenrodyellow;
            height: 100vh;
        }
         li  a {
            color:black;
         }
        
         li  :hover {
            color:white;background-color:lightgreen;padding: 10px 18px;

         }
         

        .bell {
            position: relative;
            display: inline-block;
            font-size: 20px;
        }

        .bell i {
            animation: beat 1s infinite;
        }

        @keyframes beat {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .btn {
            padding: 1px 2px;
            border-radius: 100px;
            margin-left: 8px;
        }
        .white-bg {
            background-color: lightcyan;
        }
    </style>
</head>

<body>
    <div class="container_fluid">
        <div class="col-lg-12 col-md-6">
            <nav class="navbar  justify-content-between  fixed-top white-bg ">
                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.webp" class="img-fluid" style="width: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div>
                <div class="bell">
                    <i class="fa fa-bell"></i>
                </div>
                    <button type="button" class="btn">
                        <img class="img-fluid" src="author.png" alt="">
                    </button>
                </div>
            </nav>
        </div>
    </div>

    <div class="container_fluid " style="margin-top:68px">
        <div class="col-lg-12 ">
            <div class="row no-gutters">
                <div class="col-lg-2 ">
                    
                        <ul class=" height">
                            <li class="active"><a href="index.php" class="nav-link"><span class="fa fa-home h-2">HOME</span></a></li> <hr>
                            <li class=""><a href="admin.php" class="nav-link"><span class="fa fa-lock h-2 ">   ADMIN</span></a></li><hr>
                            <li class=""><a href="user.php" class="nav-link"><span class="fa fa-user h-2"> USERS</span></a></li><hr>
                            <li class=""><a href="cat.php" class="nav-link cat"><span class="fa fa-th h-2 ">CATAGORY </span></a></li><hr>
                              <li class=""><a href="product.php" class="nav-link"><span class="fa fa-shopping-cart h-2"> PRODUCT</span></a></li><hr>
                            <li class=""><a href="blogs.php" class="nav-link"><span class="fa fa-rss h-2"> BLOGS</span></a></li><hr>
                            <li class=""><a href="contact.php" class="nav-link"><span class="fa fa-phone h-2"> CONTACT</span></a></li><hr>

                        </ul>

                </div>
                <div class="col-lg-10 ">
<div class="jumbotron" >
<h2 class="d-flex justify-content-center" >Admin  Management</h2>
        <a href="admindb.php" class= "d-flex justify-content-end" ><button class=" btn-primary p-1 mb-3" > Add Admin</button> 
        </a>

        <table class ="table table-striped  table-responsive-sm table-responsive-md  table-hover " >
    <tr>
        <th>Sr Num</th>
        <th>Email</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>


        <?php
        include('../connection/connect.php');

        $query = "SELECT  * FROM admin";
        $result = $con->query($query);
        $sr= 0;
         if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $id =$row['ID'];
                $sr++;
                $email = $row['Email'];
                $pass = $row['Password'];
?>
<tr>
    <td><?php echo $row['ID'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Password'];?></td>
    <td><a class="text-primary" href="../admin/adminedit.php?adminid=<?php echo $id;?>"><i class="fa fa-edit fa-spin "></i></a></td>
    <td><a class="text-danger" href="../admin/deleteadmin.php?adminid=<?php echo $id; ?>"><i class="fa fa-trash " ></i></a></td>
    
</tr>
<?php  
}

         }


        ?>
        </table>
</div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>