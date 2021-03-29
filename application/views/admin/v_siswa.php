<section class="content-header">
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
              <h3 class="box-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
              <a href="<?php echo site_url('siswa/add_new/');?>" class="btn btn-sm btn-info">Tambah Siswa</a><br/><br/>
                <table class="table table-bordered table-striped" id="example3">
                  <thead>
                  <tr>
                    <th>Nisn</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Id SPP</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th width="200">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  $count = 0;
                  foreach ($siswa->result() as $row) :
                  $count++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo htmlentities($row->nisn); ?></th>
                  <td><?php echo htmlentities($row->nis);?></td>
                  <td><?php echo htmlentities($row->nama);?></td>
                  <td><?php echo htmlentities($row->id_spp);?></td>
                  <td><?php echo htmlentities($row->nama_kelas);?></td>
                  <td><?php echo htmlentities($row->alamat);?></td>
                  <td><?php echo htmlentities($row->no_telp);?></td>
                  <td>
                    <a href="<?php echo site_url('siswa/get_edit/'.$row->nisn);?>" class="btn btn-sm btn-info">Update</a>
                    <a href="<?php echo site_url('siswa/delete/'.$row->nisn);?>" class="btn btn-sm btn-danger">Delete</a>
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