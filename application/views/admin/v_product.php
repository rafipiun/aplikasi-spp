<section class="content-header">
<h1>List
    <small>Product</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Product</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
              <a href="<?php echo site_url('product/add_new/');?>" class="btn btn-sm btn-info">Tambah Siswa</a><br/><br/>
                <table class="table table-bordered table-striped" id="example3">
                  <thead>
                  <tr>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th width="200">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($product->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?php echo htmlentities($row->name);?></td>
                  <td><?php echo "Rp. ".htmlentities(number_format($row->price));?></td>
                  <td>
                    <a href="<?php echo site_url('product/get_edit/'.$row->product_id);?>" class="btn btn-sm btn-info">Update</a>
                    <a href="<?php echo site_url('product/delete/'.$row->product_id);?>" class="btn btn-sm btn-danger">Delete</a>
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