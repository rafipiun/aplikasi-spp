<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Pembayaran</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
                <table class="table table-bordered table-striped" id="example4">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pembayaran</th>
                    <th>Nama Petugas (ID)</th>
                    <th>Nisn</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>Id SPP</th>
                    <th>Nominal</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($pembayaran->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo htmlentities($count); ?></th>
                  <td><?php echo htmlentities($row->id_pembayaran);?></td>
                  <td><?php echo htmlentities($row->username." (".$row->id_petugas.")");?></td>
                  <td><?php echo htmlentities($row->nisn);?></td>
                  <td><?php echo htmlentities($row->tgl_bayar);?></td>
                  <td><?php echo htmlentities($row->bulan_dibayar);?></td>
                  <td><?php echo htmlentities($row->tahun_dibayar);?></td>
                  <td><?php echo htmlentities($row->id_spp);?></td>
                  <td><?php echo htmlentities($row->jumlah_bayar);?></td>
                  </tr>
                  <?php endforeach;?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>