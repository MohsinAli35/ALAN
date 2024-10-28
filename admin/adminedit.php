<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data update</title>
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
    <?php

include("../connection/connect.php");
if (isset($_GET['adminid']));
$id = $_GET['adminid'];
 $sql = "SELECT * FROM admin WHERE ID = $id ";
 $result = $con->query($sql);
 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['Email'];
        $pass = $row['Password'];
    }
 }
$con->close();
 ?> 
  <div class="container">
      <div class="jumbotron">
        <h3 class="d-flex justify-content-center">Data Updation</h3>
      <form action="adminupdate.php" method="POST">
      <input type='hidden' name='id' value="<?php echo $id;?>">

<div><label for="">Enter New  Email:</label><br>
<input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email;?>"></div>
<div><label for=""> Enter New  Password:</label><br>
<input class="form-control" type="text" name="password" placeholder="Password" value="<?php echo $pass;?>"></div><br>
<div><input class="form-control btn-success" type="submit" value="Add"></div>
</form>
      </div></div>
</body>
</html>