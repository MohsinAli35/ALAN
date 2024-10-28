<?php
include("../connection/connect.php");
$cat_id = $_GET["cat_id"];
$delcat = "DELETE FROM categories WHERE  ID = $cat_id ";
if($con->query($delcat)){
    echo "<script>alert('catgeroy delete successfully')</script>";

    echo "<script>window.open('../admin/cat.php?cat_id','_self')</script> ";

}
else{
echo"data not found";
}
?>