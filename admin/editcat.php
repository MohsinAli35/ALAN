
<?php
include("../connection/connect.php") 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
  <!-- insert cat -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>

  <!-- breadcrumb start -->
  <div class="row" > 
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>Dashboard/ edit categories
            </li>
        </div>
    </div>

  </div>
  <!-- breadcrumb end -->
    <?php
    if(isset($_GET["cat_id"])){
        $cat_id = $_GET["cat_id"];
    $edcat ="SELECT * FROM categories WHERE ID = $cat_id ";
    $edrun = $con->query($edcat);
    while($edrow = $edrun->fetch_assoc()){
        $cat_id = $edrow["ID"];
        $cat_title = $edrow["title"];
        $cat_desc = $edrow["description"];
    ?>

  <div class="row">
    <div class="col-lg-3">    </div>
    <div class="col-lg-6">
        <div class="panel-heading">
            <h4 class="panel-title">
   <i class="fa fa-money fa-w">Edit category</i>
</h4>
        </div>
    
    <div class="panel-body">
        <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id"  required="" >

            <div class="form-group">
                <label for="" class="col-lg-4 control-label"><b>Catagory title</b></label>
                <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title ?>" required="" >
            </div>
            <div class="form-group">
                <label for="" class="col-lg-4 control-label"><b>Description</b></label>
    
    <textarea name="cat_desc" id="" cols="9" rows="6" class="form-control">
    <?php echo $cat_desc ?>
    </textarea>      
          </div>
          <div class="form-group">
                <input type="submit" class="form-control btn-primary" name="submit" value="insert category" required="" >
            </div>
            <?php }

        }
        ?>
        </form>
    </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
  

</head>
<body>
    
</body>
</html>
<?php
if(isset($_POST["submit"]) ){
    $cat_title = $_POST["cat_title"];
    $cat_desc = $_POST["cat_desc"];
    $insert_cat =" UPDATE categories SET title='$cat_title', description='$cat_desc' WHERE ID = $cat_id ";
    if(mysqli_query($con,$insert_cat)){
        echo "<script>alert('catgeroy updated successfully')</script>";
        echo "<script>window.open('../admin/cat.php?cat_id','_self')</script> ";

    }

}
?>