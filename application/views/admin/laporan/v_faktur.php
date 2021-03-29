<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Kwitansi Pembayaran</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<hr></hr>
                       
</table>
<?php 
    $b=$data->row_array();
?>
<table border="0" align="center" style="width:700px;border:none;">
        <tr>
            <th style="text-align:left;"><img src="<?php echo base_url().'assets/dist/img/smk.png'?>" width="80px" height="80px"/><h2>SMK Krian 1</h2></th>
            <th style="text-align:left;"></th>
        </tr>
        <tr>
            <th style="text-align:left;">Id Pembayaran</th>
            <th style="text-align:left;">: <?php echo $b['id_pembayaran'];?></th>
            <th style="text-align:left;">Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jumlah_bayar']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Tanggal</th>
            <th style="text-align:left;">: <?php echo $b['tgl_bayar'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Petugas</th>
            <th style="text-align:left;">: <?php echo $b['nama_petugas'];?></th>
        </tr>
</table>

    
<table border="1px solid black;" align="center" style="width:700px;margin-bottom:20px;">
<thead>

    <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Bulan dibayar</th>
        <th>Tahun dibayar</th>
        <th>Nominal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        
        $nama=$i['nama'];        
        $kelas=$i['nama_kelas'];
        $jurusan=$i['kompetensi_keahlian'];
        $bln=$i['bulan_dibayar'];
        $thn=$i['tahun_dibayar'];
        $jml=$i['jumlah_bayar'];

?>
    <tr>
        <td style="text-align:left;"><?php echo $nama;?></td>
        <td style="text-align:center;"><?php echo $kelas;?></td>
        <td style="text-align:center;"><?php echo $jurusan;?></td>
        <td style="text-align:center;"><?php echo $bln;?></td>
        <td style="text-align:center;"><?php echo $thn;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($jml);?></td>
    </tr>
<?php }?>
</tbody>
</table>
<hr></hr>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<!-- <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Padang, <?php //echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php //echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table> -->

</div>
</body>
</html>