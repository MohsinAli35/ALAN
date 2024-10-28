<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
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
<body >

   <div class="jumbotron"style="background-color:lightcyan">
   <div class="col-lg-12 ">

<form action="../admin/productddb.php" method="POST" enctype="multipart/form-data">
    <div class="col-lg-12 mb-3">
    <input type="file" name="uploadfile" >
  <input type="submit" value="Upload Image"name="submit" ><br>
  <?php  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "../p_imges/". $filename;

    // Check if the file was successfully uploaded
    if (move_uploaded_file($tempname, $folder)) {
        echo "<img src='$folder' height='100px' width='100px'>";
        
    } else {
        // File upload failed
        echo "Image upload failed.";
    }
  
}
?>
        <div class="row">
            <div class="col-lg-6">
                <h3>Name:</h3>
                <input type="text" name="product_name" class="form-control" required style="height: 40px; width: 40%;">
            </div><br>
          
        </div>        
    </div>

    <div class="col-lg-12 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <h3>Size:</h3>
            
                <select name="product_size" class="form-select border-info" style="height: 55px; width: 40%" >

                <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    
                </select>
    </div>

            <div class="col-lg-6">
                <h3>Qualities:</h3>
            
                <select name="product_quality" class="form-select border-info" style="height: 55px; width: 43%">
                <option   value="Steel">Steel</option>
                    <option value="MagnetSteel">Magnet Steel</option>
                </select>
            </div>
            <div class="col-lg-6">
                <h3>Select category:</h3>
            
                <select name="product_cat" class="form-select border-info" style="height: 55px; width: 43%">
                    <?php 
                    include("../connection/connect.php");
                    $get_cats = "SELECT * FROM categories";
                    $runcats = mysqli_query($con, $get_cats);
                    if($runcats->num_rows > 0){
                        while($rowcats = mysqli_fetch_array($runcats)){
                            $catid = $rowcats['ID'];
                            $cat_title = $rowcats['title'];
                            $description = $rowcats['description'];
                            ?>
                           <option name="product_cat" value="<?php echo $catid; ?>" ><?php echo $cat_title;?></option>
 
                            <?php
                    }
                }
                    ?>
                    
                </select>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <h3>Brand:</h3>
            
                <input type="text" name="product_brand" class="form-control"style="height: 40px; width: 40%">
            </div>
        

            <div class="col-lg-6">

        <h5>Description:</h5>
        <textarea name="product_description" class="form-control" cols="10" rows="7"></textarea>
    </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
        <div class=" col-lg-6">
        <h3>Price:</h3>
        <input type="text" name="product_price" class="form-control" required style="height: 30px; width: 15%">
        </div><div  class="col-lg-6" >
            <h3>Stock</h3>
            <input type="text" class="form-control" min="0" name="product_stock"style="height: 30px; width: 15%">
        </div></div>
    </div><br>

    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>


</body>
</html>