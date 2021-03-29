<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tambah SPP</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Tambah SPP</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('spp/save');?>" method="post">
          <div class="form-group">
            <label>Tahun</label>
            <input type="number" class="form-control" name="tahun" placeholder="Tahun" required/>
          </div>
          <div class="form-group">
            <label>Nominal</label>
            <input type="number" class="form-control" name="nominal" placeholder="Nominal" required/>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
 
    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/dist/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/dist/js/bootstrap.min.js');?>"></script>
  </body>
</html>