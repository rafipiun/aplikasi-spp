<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data stok barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>
<?php 
    $b=$jml->row_array();
?>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENJUALAN TAHUN <?php echo $b['tahun'];?></h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['bulan']){
        $bulan=$d['bulan'];
        $query=$this->db->query("SELECT id_pembayaran,DATE_FORMAT(tgl_bayar,'%M %Y') AS bulan,DATE_FORMAT(tgl_bayar,'%d %M %Y') AS tanggal,SUM(jumlah_bayar) AS total FROM pembayaran WHERE DATE_FORMAT(tgl_bayar,'%M %Y')='$bulan'");
        $t=$query->row_array();
        $tots=$t['total'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='7'><b>Bulan: $bulan</b></td> <td style='text-align:right;'><b>Total:</b></td><td width='20%' style='text-align:right;'><b>".'Rp '.number_format($tots)."</b></td></tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='3%' align='center'>No</td>
    <td width='8%' align='center'>Id Pembayaran</td>
    <td width='10%' align='center'>Tanggal</td>
    <td width='30%' align='center'>Nisn</td>
    <td width='30%' align='center'>Nama</td>
    <td width='7%' align='center'>Kelas</td>
    <td width='7%' align='center'>Bulan dibayar</td>
    <td width='7%' align='center'>Tahun dibayar</td>
    <td width='20%' align='center'>Jumlah bayar</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['bulan'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['id_pembayaran']; ?></td>
                <td style="vertical-align:top;text-align:center;"><?php echo $d['tanggal']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['nisn']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['nama']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['nama_kelas']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['bulan_dibayar']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['tahun_dibayar']; ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['jumlah_bayar']); ?></td> 
        </tr>
        

        <?php
        }
        ?>
</table>
</div>
</body>
</html>