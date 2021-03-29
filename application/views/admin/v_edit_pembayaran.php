<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Pembayaran</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
 
    <div class="container">
      <h1><center>Edit Pembayaran</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('pembayaran/update');?>" method="post">
        <input type="hidden" name="id_pembayaran" value="<?php echo htmlentities($id_pembayaran);?>">
          <div class="form-group">
            <label>Id Pembayaran</label>
            <input type="text" class="form-control" name="id_pembayaran" value="<?php echo htmlentities($id_pembayaran);?>" placeholder="Id Pembayaran" disabled/>
          </div>
          <div class="form-group">
            <label>Petugas</label>
            <input type="text" class="form-control" name="nama_petugas" value="<?php echo htmlentities($nama_petugas);?>" placeholder="Petugas" disabled/>
          </div>
          <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn" value="<?php echo htmlentities($nisn);?>" placeholder="NISN" disabled/>
          </div>
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($nama);?>" placeholder="Nama" disabled/>
          </div>
          <div class="form-group">
            <label>Tanggal bayar</label>
            <input type="date" class="form-control" name="tgl_bayar" value="<?php echo htmlentities($tgl_bayar);?>" placeholder="Tanggal" />
          </div>
          <div class="form-group">
            <label>Bulan dibayar</label><br/>
            <select name="bulan">
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="april">April</option>
                <option value="mei">Mei</option>
                <option value="juni">Juni</option>
                <option value="juli">Juli</option>
                <option value="agustus">Agustus</option>
                <option value="september">September</option>
                <option value="oktober">Oktober</option>
                <option value="november">November</option>
                <option value="desember">Desember</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tahun dibayar</label><br/>
            <select name="tahun">
            <?php foreach($data_spp->result_array() as $i) {
                    $tahun=$i['tahun'];
                ?>
                <option value="<?php echo htmlentities($tahun)?>"><?php echo htmlentities($tahun);?></option>
                <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah bayar</label>
            <input type="number" class="form-control" name="jml" value="<?php echo htmlentities($jumlah_bayar);?>" placeholder="Jumlah bayar" />
          </div>

          <a style="height:34px;width:70px" href="<?php echo site_url('pembayaran');?>" class="btn btn-sm btn-danger">Back</a>
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