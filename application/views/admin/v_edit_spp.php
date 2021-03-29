<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Spp</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Edit Spp</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('spp/update');?>" method="post">
          <div class="form-group">
            <label>Tahun</label>
            <input type="number" class="form-control" name="tahun" value="<?php echo htmlentities($tahun);?>" placeholder="Tahun">
          </div>
          <div class="form-group">
            <label>Nominal</label>
            <input type="number" class="form-control" name="nominal" value="<?php echo htmlentities($nominal);?>" placeholder="Nominal">
          </div>
          <input type="hidden" name="id_spp" value="<?php echo $id_spp?>">
          <a style="height:34px;width:70px" href="<?php echo site_url('spp');?>" class="btn btn-sm btn-danger">Back</a>
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