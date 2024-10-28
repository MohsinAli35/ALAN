<?php 
include("../connection/connect.php");

// Assuming your form sends the product_id in the POST data
if($con){
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_size = $_POST['product_size'];
    $product_quality = $_POST['product_quality'];
    $product_brand = $_POST['product_brand'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];

    // File handling
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "../imges/" . $filename;

    // Check if a new image is provided
    if ($filename !== '') {
        // Move the new image to the target folder
        if (move_uploaded_file($tempname, $folder)) {
            // Update the product information with the new image
            $update = "UPDATE products SET product_image ='$folder', product_name = '$product_name', product_size = '$product_size',
                product_quality = '$product_quality', product_brand = '$product_brand', product_description ='$product_description',
                product_price = '$product_price', product_stock='$product_stock' WHERE product_id = $id "; 

            if($con->query($update) === TRUE) {
                echo "Product data updated successfully!";
                header("location: ../admin/product.php");
            } else {
                echo "Error updating product data: " . $con->error;
            }
        } else {
            echo "Image upload failed.";
        }
    } else {
        // Update the product information without changing the image
        $update = "UPDATE products SET product_name = '$product_name', product_size = '$product_size',
            product_quality = '$product_quality', product_brand = '$product_brand', product_description ='$product_description',
            product_price = '$product_price', product_stock='$product_stock' WHERE product_id = $id "; 

        if($con->query($update) === TRUE) {
            echo "Product data updated successfully!";
            header("location: ../admin/product.php");
        } else {
            echo "Error updating product data: " . $con->error;
        }
    }
}

$con->close();
?>
