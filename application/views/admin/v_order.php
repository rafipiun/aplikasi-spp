<section class="content-header">
  <h1>Order
    <small>Pesanan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Order</li>
  </ol><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Product</h3>
              </div>
                                  <!-- Button trigger modal -->
                              <button type="button" class="btn btn-info btn-lg  btn-block btn-flat" data-toggle="modal" data-target="#produkModal">Cari produk</button>

                                    <!-- Modal -->
                      <div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="produkModal" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                            <div class="modal-body" style="overflow:scroll;height:500px;">
                            <h3 class="modal-title" id="myModalLabel" >Data Barang</h3>
                            <!-- /.card-header -->
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
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
                                    <td style="text-align:center;">
                                            <form action="<?php echo site_url('order/add')?>" method="post">
                                            <input type="hidden" name="product_id" value="<?php echo $row->product_id;?>">
                                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row->name);?>">
                                            <input type="hidden" name="price" value="<?php echo number_format($row->price);?>">
                                            <input type="hidden" name="qty" value="1" required>
                                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                            </form>
                                    </td>
                                  </tr>
                                  <?php endforeach;?>
                                  </tbody>
                                </table>
                              </div>
                             <!-- /.card-body -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                          <!-- End Modal -->
            </div>
            <!-- /.card -->

            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body table-responsive no-padding">
              <a href="<?php echo site_url('order/reset/')?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Bersihkan Keranjang </a>
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id Produk</th>
                        <th>Nama Produk</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                         <td style="text-align:center;">
                          <form method='post' action='<?php echo site_url('order/update/'.$items['rowid']);?>'>
                          <input type='hidden' name='id' value='<?=$items['id'];?>'/> 
                              <input name="decqty" type="submit" value="-">
                              <label>&emsp;<?php echo number_format($items['qty']);?>&emsp;</label>
                              <input name="incqty" type="submit" value="+">
                        </form>
                        </td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo site_url('order/remove/'.$items['rowid']);?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Hapus </a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <form action="<?php echo site_url('order/simpan')?>" method="post">
            <table class="pembayaran">
                <tr>
                    <td class="jarak" rowspan="2"><button type="submit" class="btn btn-info btn-lg simpan"> Simpan</button></td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;">
                    
                    <input type="text" name="total2" id="jml_total" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>