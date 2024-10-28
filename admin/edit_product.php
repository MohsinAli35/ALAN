    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product updation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <style>
        h3{
            font-size: 20px;
        }
    
        
    </style>
    </head>
    <body>
        


    <?php
    include("../connection/connect.php");
    if(isset($_GET["productid"])){
        $id = $_GET["productid"];

    $edtp = "SELECT * FROM `products` WHERE  product_id = $id ";
    $result= $con->query($edtp);

    if($result->num_rows > 0){

        while($rowp = $result->fetch_assoc()){
            $ID = $rowp["product_id"];
        $folder = $rowp["product_image"];
        $product_name = $rowp["product_name"];
        $product_stock= $rowp["product_stock"];
        $product_size = $rowp["product_size"];
        $product_brand=$rowp["product_brand"];

        $product_price = $rowp["product_price"];
        $product_description = $rowp["product_description"];
    }
    }
    }
    $con->close();


    ?>

    <div class="jumbotron"style="background-color:lightcyan">
            <h2 class=" d-flex justify-content-center py-3 "
            style="background-color:cyan; color:salmon">Product Updation</h2>
        
        
    <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "../imges/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        if (file_exists($folder)) {
            echo "<img src='$folder' height='100px' width='100px'>";
        } else {
            echo "Image not found.";
        }
    } else {
        echo "Image upload failed.";
    }
}

    ?>
    
    <form action="productupd.php" method="POST" enctype="multipart/form-data">
            <input type='hidden' name='id' value='<?php echo $ID;?>'>

            
        <div class="col-lg-12 mb-3">
        <input type="file" name="uploadfile"  ><?php echo $folder?>
    <input type="submit" value="Upload Image"name="submit" ><br>
            <div class="row">
                <div class="col-lg-6">
                    <h3>Name:</h3>
                    <input type="text" name="product_name" class="form-control"
                    value="<?php echo $product_name?>"  style="height: 40px; width: 40%;">
                </div><br>
            
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Size:</h3>
                
                    <select name="product_size" value="<?php echo $product_size?>"  class="form-select border-info" style="height: 55px; width: 40%" >
                        <option selected>Choose Size</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>
            
        </div>

                <div class="col-lg-6">
                    <h3>Qualities:</h3>
                
                    <select name="product_quality"value="<?php echo $product_quality?>"  class="form-select border-info" style="height: 55px; width: 43%">
                        <option selected>Choose Quality</option>
                        <option value="Steel">Steel</option>
                        <option value="MagnetSteel">Magnet Steel</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Brand:</h3>
                
                    <input type="text" name="product_brand" value="<?php echo $product_brand?>"  class="form-control"style="height: 40px; width: 40%">
                </div>
            

                <div class="col-lg-6">

            <h5>Description:</h5>
            <textarea cols="10" rows="7" name="product_description" class="form-control"><?php echo $product_description ?></textarea>
    
        </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
            <div class=" col-lg-6">
            <h3>Price:</h3>
            <input type="text" name="product_price" class="form-control" value="<?php echo $product_price?>" style="height: 30px; width: 15%">
            </div><div  class="col-lg-6" >
                <h3>Stock</h3>
                <input type="text" class="form-control" min="0" name="product_stock"value="<?php echo $product_stock?>" style="height: 30px; width: 15%">
            </div></div>
        </div><br>

    

                <button type="submit" class="btn btn-success mt-4 form-control">Edit</button>

    

            </form> </div>
    </body>
    </html>