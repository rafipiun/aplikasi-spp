<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Siswa</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/dist/js/bootstrap-show-password.min.js')?>"></script>
  </head>
  <body>
 
    <div class="container">
      <h1><center>Edit Siswa</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('siswa/update');?>" method="post">
          <div class="form-group">
            <label>Nisn</label>
            <input type="text" class="form-control" name="nisn" value="<?php echo htmlentities($nisn);?>" placeholder="NISN">
          </div>
          <div class="form-group">
            <label>Nis</label>
            <input type="text" class="form-control" name="nis" value="<?php echo htmlentities($nis);?>" placeholder="Nis">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($nama);?>" placeholder="Nama Siswa">
          </div>
          <div class="form-group">
            <label>Id SPP</label>
            <input type="text" class="form-control" name="id_spp" value="<?php echo htmlentities($id_spp);?>" placeholder="Id SPP">
          </div>
          <div class="form-group">
            <label>Kelas</label><br>
            <select name="id_kelas" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <?php foreach($data_kelas->result_array() as $i) {
                    $id=$i['id_kelas'];
                    $kelas=$i['nama_kelas'];
                ?>
                <option value="<?php echo htmlentities($id)?>"><?php echo htmlentities($kelas);?></option>
                <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo htmlentities($alamat);?>" placeholder="Alamat">
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" class="form-control" name="no_telp" value="<?php echo htmlentities($no_telp);?>" placeholder="No Telp">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Kosongkan jika tidak ingin mengubah">
          </div>
          <a style="height:34px;width:70px" href="<?php echo site_url('siswa');?>" class="btn btn-sm btn-danger">Back</a>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
 
    <script type="text/javascript">
	$("#password").password('toggle');
    </script>
    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/dist/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/dist/js/bootstrap.min.js');?>"></script>
  </body>
</html>