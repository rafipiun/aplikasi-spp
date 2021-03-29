<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Spp</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Spp</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
              <a href="<?php echo site_url('spp/add_new/');?>" class="btn btn-sm btn-info">Tambah Spp</a><br/><br/>
                <table class="table table-bordered table-striped" id="example4">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Nominal</th>
                    <th width="200">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($spp->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?php echo htmlentities($row->tahun);?></td>
                  <td><?php echo "Rp. ".number_format(htmlentities($row->nominal),2,',','.')  ;?></td>
                  <td>
                    <a href="<?php echo site_url('spp/get_edit/'.$row->id_spp);?>" class="btn btn-sm btn-info">Update</a>
                    <a href="<?php echo site_url('spp/delete/'.$row->id_spp);?>" class="btn btn-sm btn-danger">Delete</a>
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