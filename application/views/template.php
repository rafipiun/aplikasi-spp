<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi SPP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?=base_url()?>dashboard" class="logo">
      <span class="logo-mini">SPP<b>K</b></span>
      <span class="logo-lg">SPP</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/smk.png" class="user-image">
              <?php
                if($this->session->userdata('level') !== 3){
                  echo '<span class="hidden-xs">'.$this->fungsi->user_login()->username.'</span>';
                }else{
                  echo '<span class="hidden-xs">'.$this->fungsi->user_login()->nama.'</span>';
                }
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/smk.png" class="img-circle">
                <?php
                if($this->session->userdata('level') !== 3){
                  echo '<p>'.$this->fungsi->user_login()->nama_petugas.'</p>';
                }else{
                  echo '<p>'.$this->fungsi->user_login()->nama.'</p>';
                }
              ?>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/smk.png" class="img-circle">
        </div>
        <div class="pull-left info">
        <?php
          if($this->session->userdata('level') !== 3){
            echo '<p>'.ucfirst($this->fungsi->user_login()->username).'</p>';
          }else{
            echo '<p>'.ucfirst($this->fungsi->user_login()->nama).'</p>';
          }
        ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          
        </div>
      </form>
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->session->userdata('level') == 1) {?>
        <li>
          <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        <li>
          <a href="<?=site_url('pembayaran')?>"><i class="ion ion-bag"></i><span>Pembayaran</span></a>
        </li>
        <li>
          <a href="<?=site_url('siswa')?>"><i class="ion ion-bag"></i><span>Siswa</span></a>
        </li>
        <li>
          <a href="<?=site_url('kelas')?>"><i class="ion ion-bag"></i><span>Kelas</span></a>
        </li>
        <li>
          <a href="<?=site_url('spp')?>"><i class="ion ion-bag"></i><span>SPP</span></a>
        </li>
        <li>
          <a href="<?=site_url('laporan')?>"><i class="ion ion-bag"></i><span>Laporan</span></a>
        </li> 
       
        <li class="header">SETTINGS</li>
        <li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>

        <?php }elseif($this->session->userdata('level') == 2){ ?>
        <li>
          <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        <li>
          <a href="<?=site_url('pembayaran')?>"><i class="ion ion-bag"></i><span>Pembayaran</span></a>
        </li>
        <?php }else{ ?>
        <li>
          <a href="<?=site_url('riwayat')?>"><i class="ion ion-bag"></i><span>Riwayat</span></a>
        </li>
        <?php } ?>

      </ul>
    </section>
  </aside>

  <!-- Content Wrapper-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $contents ?>
  </div>

  <footer class="main-footer">
   <strong>&copy; Copyright <?php echo date("Y"); ?> | SMK Krian 1 Sidoarjo<a href="https://adminlte.io"></a>.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $('#jml_uang').bind('input',function(){ 
         var total_decimal = $('#jml_total').val();
         var total_int = total_decimal.replace(/,/g, '');
         var tunai = parseFloat($(this).val()) || 0;
         if(tunai >= total_int && tunai === parseInt(tunai, 10)){
          var kembalian = (tunai - total_int);
         }else{
          $('#jml_kembalian').val(0);
         }
        // var kembalian = (tunai - total_int);
         $('#jml_kembalian').val(kembalian);
    });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "columnDefs": [
    { "width": "5%", "targets": 0,
      "width": "5%", "targets": 1,
      "width": "5%", "targets": 2,
      "width": "5%", "targets": 3,
      "width": "5%", "targets": 4,
      "width": "5%", "targets": 5,
      "width": "20%", "targets": 6,
      "responsive": true,
      "autoWidth": false, }
    ]
    });
    
    $("#example3").DataTable({
      "columnDefs": [
    { "width": "5%", "targets": 0,
      "width": "5%", "targets": 1,
      "width": "5%", "targets": 2,
      "width": "20%", "targets": 3,
      "responsive": true,
      "autoWidth": false, }
    ]
     
    });
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
