<section class="content-header">
<h1>History
    <small>Pembelian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">History</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Daftar Pembelian</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Order Id</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Tunai</th>
                    <th>Kembalian</th>
                    <th>Tanggal pembelian</th>
                    <th width="500px">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($history->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?php echo $row->jual_id;?></td>
                  <td><?php echo "Rp. ".htmlentities(number_format($row->jual_total));?></td>
                  <td><?php echo "Rp. ".htmlentities(number_format($row->jual_tunai));?></td>
                  <td><?php echo "Rp. ".htmlentities(number_format($row->jual_kembalian));?></td>
                  <td><?php echo $row->jual_tanggal;?></td>
                  <td>
                    <a href="<?php echo site_url('order/cetak_faktur/'.$row->jual_id);?>" class="btn btn-sm btn-info" target=_blank>Cetak</a>
                    <a href="<?php echo site_url('order/delete/'.$row->jual_id);?>" class="btn btn-sm btn-danger">Delete</a>
                  </td>
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