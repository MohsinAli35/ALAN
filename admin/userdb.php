<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL USERS</title>
</head>
<body>
    
<?php
    include('../connection/connect.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $Folder = "../userimges/".$filename;
    move_uploaded_file($tempname, $Folder);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "INSERT INTO user (user_image,Name, Email, Password) VALUES ('$Folder','$name', '$email', '$pass')";
  
        if (mysqli_query($con, $sql)) {
            echo "Your data submitted";
            header("location:../frontend/alann.php");
        } else {
            echo "Not successfully " . $sql . "<br>" . $con->error;
        }
    }
    ?>
</body>
</html>