 
    <div class="container">
      <h1><center>Tambah Pembayaran</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('pembayaran/save');?>" method="post">
            
            <input type="hidden" name="id_petugas" value="<?=$this->fungsi->user_login()->id_petugas?>" required/>
          <div class="form-group">
            <label>Nama (Nisn) </label><br>
            <select name="nisn" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <?php foreach($data_siswa->result_array() as $i) {
                    $nisn=$i['nisn'];
                    $nama=$i['nama'];
                ?>
                <option value="<?php echo htmlentities($nisn)?>"><?php echo htmlentities($nama.' ('.$nisn.')');?></option>
                <?php }?>
            </select>
          </div>
            <input type="hidden" class="form-control" name="tgl_bayar" value="<?php echo date('Y-m-d');?>"/>
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
            <label>Tahun dibayar </label><br>
            <select name="tahun" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <?php foreach($data_spp->result_array() as $i) {
                    $id =$i['id_spp'];
                    $tahun=$i['tahun'];
                ?>
                <option value="<?php echo htmlentities($tahun)?>"><?php echo htmlentities($tahun);?></option>
                <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah Bayar</label>
            <input type="number" class="form-control" name="jml" placeholder="Jumlah Bayar" required/>
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