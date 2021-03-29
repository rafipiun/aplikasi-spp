<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Kelas</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
              <a href="<?php echo site_url('kelas/add_new/');?>" class="btn btn-sm btn-info">Tambah Kelas</a><br/><br/>
                <table class="table table-bordered table-striped" id="example4">
                  <thead>
                  <tr>
                    <th>Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th width="200">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($kelas->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo htmlentities($row->nama_kelas); ?></th>
                  <td><?php echo htmlentities($row->kompetensi_keahlian);?></td>
                  <td>
                    <a href="<?php echo site_url('kelas/get_edit/'.$row->id_kelas);?>" class="btn btn-sm btn-info">Update</a>
                    <a href="<?php echo site_url('kelas/delete/'.$row->id_kelas);?>" class="btn btn-sm btn-danger">Delete</a>
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