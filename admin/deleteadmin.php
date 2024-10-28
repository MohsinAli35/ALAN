<?php
include("../connection/connect.php");
$ID = $_GET["adminid"];

$sql ="DELETE FROM admin WHERE ID='$ID'";

if($con->query($sql)){

    header("location:../admin/admin.php");
}
else{
    echo"data not found";
}
?>