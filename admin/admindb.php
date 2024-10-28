
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adimndb</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://fontawesome.com/v5/icons/edit?f=classic&s=light&an=spin">


</head>
<body>
    <div class="container">
      <div class="jumbotron">
        <h3 class="d-flex justify-content-center">Add Manager</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<div><label for="">Enter New  Email:</label><br>
<input class="form-control" type="email" name="email" placeholder="Email"required></div>
<div><label for=""> Enter New  Password:</label><br>
<input class="form-control" type="password" name="password" placeholder="Password"required></div><br>
<div><input class="form-control btn-success" type="submit" value="Add"></div>
</form>
      </div></div>

</body>
</html>



<?php

include('../connection/connect.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO admin ( Email, Password) VALUES ( '$email', '$pass')";

    if (mysqli_query($con, $sql)) {
       
        echo " Now a new admin/employee can access your Dashboard  ";
       header("location:admin.php");
       ?>
       <a href="../admin/admin.php" > <span class="fa fa-arrow-right" ></span></a>
        <?php
    } else {
        echo "Not successfully " . $sql . "<br>" . $con->error;
    }
}

?>