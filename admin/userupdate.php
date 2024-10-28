

<?php 


include ('../connection/connect.php');
$query = " SELECT * from form " ;
$result = $con->query($query);


if($con){
    $ID = $_POST['id'];
       $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE user SET Name ='$name', Email = '$email', Password = '$password' WHERE U_ID = $ID";
    // echo "SQL Query: " . $query;  
          if($con->query($query) === TRUE) {
        echo "User data updated successfully!" ;
        header ("location:../admin/user.php");
    } else {
        echo "Error updating user data: " . $con->error;
    }
}

?>
<html>
    <form action= "../admin/user.php" method="post">
        <button type="submit">click here</button>
    
    <form>
</html>