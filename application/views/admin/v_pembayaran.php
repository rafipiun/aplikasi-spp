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
              <a href="<?php echo site_url('pembayaran/add_new/');?>" class="btn btn-sm btn-info">Tambah Pembayaran</a><br/><br/>
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
                    <?php if($this->session->userdata('level') == 1){?>
                    <?php echo '<th width="200">Aksi</th>';?>
                    <?php } ?>
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
                  <?php if($this->session->userdata('level') == 1){?>
                    <?php echo '
                      <td>
                      <a href='.site_url('pembayaran/cetak/'.$row->id_pembayaran).' class="btn btn-sm btn-success">Cetak</a>
                      <a href='.site_url('pembayaran/get_edit/'.$row->id_pembayaran).' class="btn btn-sm btn-info">Update</a>
                      <a href='.site_url('pembayaran/delete/'.$row->id_pembayaran).' class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    ';?>
                    <?php } ?>
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