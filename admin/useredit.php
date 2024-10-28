<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>useredit</title>
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
include('../conection/connect.php');

if(isset($_GET['userid']));
    $ID = $_GET['userid'];

    $query = "SELECT* FROM user WHERE U_ID=$ID";
    $result = $con->query($query);
    
    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc() ) {
            $name = $row['Name'];
            $email = $row['Email'];
            $pass = $row['Password'];
        
        }
    }



$con->close();
?>
<br><br>

<div class="container">
      <div class="jumbotron">
        <h3 class="d-flex justify-content-center">Data Updation</h3>
    
        <form  action="../admin/userupdate.php" method="POST">
        <input type='hidden' name='id' value='<?php echo $ID;?>'>

            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo isset($name) ? $name:''; ?>">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo isset($email) ? $email:''; ?>">
            <label for="password">Password:</label>
            <input type="text" class="form-control" placeholder="Enter password" name="password" value="<?php echo isset($pass) ? $pass:''; ?>">
            
            <button type="submit" class="btn btn-success mt-4 form-control">Edit</button>

 

        </form> </div></div>
    
</body>
</html>
