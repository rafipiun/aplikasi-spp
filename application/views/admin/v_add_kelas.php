<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tambah Kelas</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Tambah Kelas</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('kelas/save');?>" method="post">
          <div class="form-group">
            <label>Kelas</label>
            <input type="text" class="form-control" name="kelas" placeholder="Kelas" required/>
            <label>Contoh: XII RPL 1</label>
          </div>
          <div class="form-group">
            <label>Kompetensi Keahlian</label>
            <select name="kompetensi" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kompetensi Keahlian" data-width="80%" required/>
            <option>Rekayasa Perangkat Lunak</option>
            <option>Teknik Pemesinan</option>
            <option>Teknik Instalasti Tenaga Listrik
            <option>Teknik Pengelasan</option>
            </select>
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