<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details </title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fontawesome.com/v5/icons/edit?f=classic&s=light&an=spin">

</head>
<body>
    <?php 
    include("header.php");
    ?>
    <div class="container-fluid ">
        <img src="../img/b2.webp" class="img-fluid w-100" style="height: 400px;"alt="b2">
    </div>
    <div class="container-fluid ">
    <table class=" table responsive table-bordered my-5 ">
    <thead>
      <tr>
        <th>Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Remove</th>
      </tr>
    </thead>
    <?php 
    if(isset ($_GET['produtid']));
    $id = $_GET['productid'];
    include('../connection/connect.php');
    $cartq = "SELECT* FROM `products` WHERE product_id = '$id' ";
    $cartresult =$con->query($cartq);
    if($cartresult->num_rows > 0){
        while($cartrow = $cartresult->fetch_assoc()){
        $folder = $cartrow['product_image'];
        $p_price = $cartrow['product_price'];
        $p_name = $cartrow['product_name'];
        ?>
        <tbody>
            <tr>
                <td><?php echo "<img src='$folder ' ; width='100px'; height='100px'>";?></td>
                <td><?php echo"$p_name"?></td>
                <td>
                    <?php echo "$p_price"?>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <?php
        }
    }
    ?>
    </table>
    </div>
</body>
</html>