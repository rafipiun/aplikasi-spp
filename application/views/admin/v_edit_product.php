<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Product</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Edit Product</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('product/update');?>" method="post">
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlentities($name);?>" placeholder="Product Name">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" value="<?php echo htmlentities($price);?>" placeholder="Price">
          </div>
          <input type="hidden" name="product_id" value="<?php echo $product_id?>">
          <a style="height:34px;width:70px" href="<?php echo site_url('product');?>" class="btn btn-sm btn-danger">Back</a>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
 
    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/dist/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/dist/js/bootstrap.min.js');?>"></script>
  </body>
</html>