<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Pembayaran</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PEMBAYARAN</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<?php 
    $b=$jml->row_array();
?>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11" style="text-align:left;">Tanggal : <?php echo $b['tanggal'];?></th>
</tr>
    <tr>
        <th style="width:50px;">No</th>
        <th>Id Pembayaran</th>
        <th>Tanggal</th>
        <th>Nisn</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Bulan dibayar</th>
        <th>Tahun dibayar</th>
        <th>Jumlah bayar</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $id=$i['id_pembayaran'];
        $tgl=$i['tgl_bayar'];        
        $nisn=$i['nisn'];
        $nama=$i['nama'];
        $kelas=$i['nama_kelas'];
        $bulan=$i['bulan_dibayar'];
        $tahun=$i['tahun_dibayar'];
        $jumlah=$i['jumlah_bayar'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $id;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:left;"><?php echo $nisn;?></td>
        <td style="text-align:left;"><?php echo $nama;?></td>
        <td style="text-align:center;"><?php echo $kelas;?></td>
        <td style="text-align:center;"><?php echo $bulan;?></td>
        <td style="text-align:center;"><?php echo $tahun;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($jumlah);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="8" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['total']);?></b></td>
    </tr>
</tfoot>
</table>
</div>
</body>
</html>