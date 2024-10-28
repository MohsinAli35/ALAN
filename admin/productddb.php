<?php

include("../connection/connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve data from the form
    $product_name = $_POST['product_name'];
    $product_size = $_POST['product_size'];
    $product_quality = $_POST['product_quality'];
    $product_cat = $_POST['product_cat'];

    $product_brand = $_POST['product_brand'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];


    // Handle the uploaded image
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "../p_imges/" . $filename;
    move_uploaded_file($tempname, $folder);
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Other form data retrieval code...
    
        $product_cat = isset($_POST['product_cat']) ? $_POST['product_cat'] : '';
    
        // Check if the selected category is not empty before using it in the query
        if (!empty($product_cat)) {
        } else {
            echo "Please select a category for the product.";
        }
    }
        $catqur = "SELECT title from categories where ID ='$product_cat'";
        $run_q = mysqli_query($con,$catqur);
        if($run_q->num_rows > 0){
        while($rowcat =$run_q->fetch_assoc()){
            $cat_title  = $rowcat['title'];
        }
        

    // Insert data into the "products" table
//     $get_cat_title = "SELECT title FROM categories WHERE ID = '$product_cat'";
// $run_cat_title = mysqli_query($con, $get_cat_title);

// if ($run_cat_title->num_rows > 0) {
//     $row_cat_title = mysqli_fetch_assoc($run_cat_title);
//     $cat_title = $row_cat_title['title'];

    $sql = "INSERT INTO products ( cat_id,title, product_image,product_name, product_size, product_quality, product_brand, product_description, 
    product_price, product_stock)
            VALUES ('$product_cat','$cat_title','$folder', '$product_name', '$product_size', '$product_quality', '$product_brand','$product_description', '$product_price', '$product_stock')";

    if (mysqli_query($con, $sql)) {
        echo "Product data inserted successfully!";
        header("location:../admin/product.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

    // Close the database connection
    mysqli_close($con);
}
?>


