<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin   login </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">

  <style>
    .style{   padding-top: 40px;  border-top:4px solid lightblue;border-bottom: 3px solid violet;border-left: 3px solid violet;
        background-color:lavender;border-right: 3px solid lightblue;
height:430px;display:flex; justify-content:center;
    }
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
<body>
    <div style=" display:flex;justify-content:
        center;align-items:center;height:100vh">
    <div class="cotainer-fluid  style" >
        <div class="container">
            <div style="display:flex; justify-content:center;">
        <img class="img-fluid mb-4" src="img/admin.jpg" alt="admin3" 
        style="width:100px;  border-radius:100%">
    </div>
<form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="email" class="form-control" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password"  class="form-control" required> <br>   

    <input type="submit" value="Login" class="custom-button form-control">
<?php 
include('../connection/connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = $_POST['email'];
$password =$_POST['password'];
$query = "SELECT* FROM admin WHERE Email = '$email' ";
$result = $con->query($query);
$login_successful = false;
if($result->num_rows > 0){
while ( $row = $result->fetch_assoc()){
$ID = $row['ID'];
$name =$row ['Email'];
$add=$row['Password'];
if($name == $email && $add == $password){
    $login_successful=true; 

    header('location:../admin/index.php');
}

}
}

if (!$login_successful) {
?>
<p class="text-danger mt-2 " >*Incorrect email or password</p>
<?php
}
}



?>

    </form></div></div></div>

</body>
</html>