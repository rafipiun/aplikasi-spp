<section class="content-header">
  <h1>Users
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Users</li>
  </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1;
                    foreach($row->result() as $key =>$data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->username?></td>
                        <td><?=$data->nama_petugas?></td>
                        <td><?=$data->level == 1 ? "Admin" : "Petugas"?></td>
                        <td class="text-center" width="160px">
                            <form action="<?=site_url('user/del/')?>" method="post">
                                <a href="<?=site_url('user/edit/'.$data->id_petugas)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <input type="hidden" name="id_petugas" value="<?=$data->id_petugas?>">
                                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
