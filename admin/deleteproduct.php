<?php 
include("../connection/connect.php");

if(isset($_GET["productid"])){
$id = $_GET["productid"];

$delpro = "DELETE FROM  products WHERE product_id = $id ";

if($con->query($delpro) === true){

    header("location:../admin/product.php");
}
else{
    echo "No Data found";
}

}


?>