<section class="content-header">
  <h1>Laporan
    <small>Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Laporan</li>
  </ol>
         <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih..</h3>
              </div>
              <div class="box-body">
                                  <!-- Button trigger modal -->
                              <button type="button" class="btn btn-info btn-lg btn-block btn-flat " data-toggle="modal" data-target="#lap_jual_pertanggal">Pembayaran per Tanggal</button><br/>
                              <button type="button" class="btn btn-success btn-lg btn-block btn-flat" data-toggle="modal" data-target="#lap_jual_perbulan">Pembayaran per Bulan</button><br/>
                              <button type="button" class="btn btn-secondary btn-lg btn-block btn-flat" data-toggle="modal" data-target="#lap_jual_pertahun">Pembayaran per Tahun</button><br/>
              </div>
                                    <!-- Modal per Tanggal-->

                                    <div class="modal" id="lap_jual_pertanggal" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title">Pilih Tanggal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?=site_url('laporan/lap_pembayaran_pertanggal')?>">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                            <label class="control-label col-xs-3" >Tanggal</label>
                                                            <div class="col-xs-9">
                                                                    <input type='date' name="tgl" class="form-control" value="" placeholder="Tanggal..." required/>
                                                            </div>
                                                        </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Cek Laporan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                          <!-- End Modal -->
                           <!-- Modal per Bulan-->

                           <div class="modal" id="lap_jual_perbulan" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title">Pilih Bulan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?=site_url('laporan/lap_pembayaran_perbulan')?>">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                  <label class="control-label col-xs-3" >Bulan</label>
                                                  <div class="col-xs-9">
                                                          <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                                                          <?php foreach ($bayar_bln->result_array() as $k) {
                                                              $bln=$k['bulan'];
                                                          ?>
                                                              <option><?php echo $bln;?></option>
                                                          <?php }?>
                                                          </select>
                                                  </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Cek Laporan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                          <!-- End Modal -->
                          <!-- Modal per Tahun-->

                          <div class="modal" id="lap_jual_pertahun" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title">Pilih Tahun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?=site_url('laporan/lap_pembayaran_pertahun')?>">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                <label class="control-label col-xs-3" >Tahun</label>
                                                <div class="col-xs-9">
                                                        <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required/>
                                                        <?php foreach ($bayar_thn->result_array() as $t) {
                                                            $thn=$t['tahun'];
                                                        ?>
                                                            <option><?php echo $thn;?></option>
                                                        <?php }?>
                                                        </select>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Cek Laporan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                          <!-- End Modal -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 