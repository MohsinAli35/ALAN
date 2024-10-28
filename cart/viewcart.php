<?php

include('../connection/connect.php');
session_start();
if(isset($_GET['productid'])){
    $id = $_GET['productid'];
}
if(isset($_GET['quantity'])){
    $newquantity = $_GET['quantity'];
}
if (isset($_SESSION['cart'])) {
    $productFound = false;
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($id == $value['id']) {
            echo "Item already added!";
            $_SESSION['cart'][$key]['quantity'] = $newquantity;
            $productFound = true;
            break;  // Exit loop when product is found
        }
    }
    
    // If product is not found, add it to the cart
    if (!$productFound) {
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array(
            "id" => $id,
            "quantity" => $newquantity
        );
    }
} else {
    // First item being added to cart
    $_SESSION['cart'][0] = array(
        "id" => $id,
    
        "quantity" => $newquantity
    );

    echo $id ;

}

include('header.php');
 

foreach($_SESSION['cart'] as $key => $value){
    echo $value['quantity'];
    echo $value['id'] . "<br>";
}
 ?>
 
 <a href="cart.php?productid= <?php echo $id; ?> ">view Cart</a>

