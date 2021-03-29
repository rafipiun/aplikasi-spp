<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tambah Siswa</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Tambah Siswa</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('siswa/save');?>" method="post">
          <div class="form-group">
            <label>Nisn</label>
            <input type="number" class="form-control" name="nisn" placeholder="Nisn" required/>
          </div>
          <div class="form-group">
            <label>Nis</label>
            <input type="number" class="form-control" name="nis" placeholder="Nis" required/>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" required/>
          </div>
          <div class="form-group">
            <label>Id SPP</label><br/>
            <select name="id_spp" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <?php foreach($data_spp->result_array() as $i) {
                    $id=$i['id_spp'];
                    $tahun=$i['tahun'];
                ?>
                <option value="<?php echo htmlentities($id)?>"><?php echo htmlentities($tahun);?></option>
                <?php }?>
            </select>
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
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required/>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" class="form-control" name="no_telp" placeholder="No Telp" required/>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password"  minlength="4" maxlength="20" required/>
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