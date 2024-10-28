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

<body >
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

    <div class="container_fluid " style="margin-top:70px">
        <div class="col-lg-12 ">
            <div class="row ">
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
                <div class="col-lg-10">
                <div class="container">
        <h2 class="my-5" style="display:flex;justify-content:center;text-decoration:none" >Category Management</h2>
        <a href="addcat.php" class=" my-4" style="display:flex;justify-content:end;text-decoration:none"> 
    <button  class="btn-primary text-white " >  
              Add Category
            </button>
        </a>
                  <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            include("../connection/connect.php");
            $get_cat = "SELECT * FROM categories ";
            $runcat = $con->query($get_cat);
            $sr=0;
            if($runcat->num_rows > 0) {
                while($rowcat = $runcat->fetch_assoc()) {   
                    $cat_id = $rowcat["ID"];
                    $sr++;
                    $cat_title= $rowcat["title"];
                    $cat_desc= $rowcat["description"];

            
            ?>
           

            <tbody>
                <tr>
                    <td><?php echo"$cat_id"; ?></td>
                    <td><?php echo"$cat_title"; ?></td>
                    <td><?php echo"$cat_desc"; ?>   </td>
                    <td>
                        <a href="editcat.php?cat_id=<?php echo $cat_id; ?>" class="fa fa-spin fa-edit"></a>
                    </td>
                    <td>
                        <a href="delcat.php?cat_id=<?php echo $cat_id; ?>" class=" fa fa-trash text-danger "></a>
                    </td>
                </tr>
                <?php
                    }
                    }
                else {
                 echo "not conected";
            }

            ?>
                <!-- Add more category rows here as needed -->
            </tbody>
        </table>
    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>