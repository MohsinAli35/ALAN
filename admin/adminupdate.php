<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminupdate</title>
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
    $sql= "SELECT *FROM admin ";

$result = $con->query("$sql");
if($con){
    $id = $_POST["id"];
$email = $_POST['email'];
$pass = $_POST['password'];



    $sql ="UPDATE admin SET Email='$email',Password ='$pass' WHERE ID = '$id' ";
    if($con->query($sql) === TRUE) {
        echo "Admin data updated successfully!" ;
    header("location:../admin/admin.php");
    }

     else {
        echo "Error updating admin data: " . $con->error;
    }
}
    ?>
    <p >For check updation <a href="../admin/admin.php"> <i class="fa fa-arrow-right" ></i></a> </p>
</body>
</html>