<?php 

include('../connection/connect.php');

$ID = $_GET['userid'];

echo "ID number =" .$ID;

$query = " DELETE FROM user where U_ID='$ID' ";




if($con->query($query) === True){
   header("location:../admin/user.php");
    }
    else{
        echo "No Data found";
    }

?> 