<?php 
function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
?>
<html>
<head>
	<title>PDF  | SPP SMK</title>
</head>
<body>
<style>
body{

}
table {
  width: 100%;
  display: table;
  border-collapse:collapse;
}
span.bodoni{
	font-family: Times;
	font-size: 24px;
	font-style:bold;
}
span.arial{
	font-family: Arial;
	font-size: 18px;
	font-style:bold;
}

table, th, td {
}
td, th {
  padding: 5px;
  display: table-cell;
}
td.x{
	width : 20%;
}
td.a{
	width : 60%;
}
table.ex1{

}
span.blue{
	font-color: rgb(0, 0, 255);
}
a{
	line-color:black;
}
a.nama{
	text-decoration:none;
}
</style> 

<table border="1">
		<tr> 
			<td>
				<div style="padding-left:30px;">
					<table>
						<tr>
							<td style="text-align:center">
							<img src="./image/1.jpg" width="200px" height="200">
							</td>

							<td style="padding-right:100px;" align="center">
							<span class="bodoni">SMK PERGURUAN CIKINI</span><br><br>
							<span>Jalan Alur Laut Blok NN No. 1, RT.05 / RW.10, Rawabadak Utara, Koja, RT.5/RW.10, Rawabadak Utara, Koja, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14230</span>
							</td>
						</tr>

						<tr>
							<td colspan="2" align="center">
								<span class="arial"><b>Tanda Bukti Pembayaran</b></span>
							</td>
						</tr>
					</table>

					<table style="padding-top:15px;">
						<tr>
							<td>NIS</td>
							<td>:</td>
							<td><b><?php echo $spp->NIS ?></b></td>
							<td style="padding-left:30">Tahun Ajaran</td>
							<td>:</td>
							<td><?php echo $spp->tahun ?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $spp->nama ?></td>
							<td style="padding-left:30">Kelas</td>
							<td>:</td>
							<td><?php echo $spp->kelas ?></td>
						</tr>
						<tr>	
							<td></td>
							<td></td>
							<td></td>
							<td style="padding-left:30">Tingkat</td>
							<td>:</td>
							<td>
								<?php 
								if($spp->tingkat=='X'){
									echo $spp->tingkat." (sepuluh)";
								}else if($spp->tingkat=='XI'){
									echo $spp->tingkat." (sebelas)";
								}else{
									echo $spp->tingkat." (dua belas)";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Jenis Pembayaran</td>
							<td>:</td>
							<td>SPP <?php echo $spp->bulan ?></td>
						</tr>
						<tr>
							<td>Jumlah Yang Di bayar</td>
							<td>:</td>
							<td>Rp. <?php echo number_format($spp->jumlah,2, ",", ".") ?> (<u><?php echo ucwords(Terbilang($spp->jumlah)) ?> Rupiah</u> )</td>
						</tr>

					</table>

				
			<table  class="table" style="padding-top:10;"  >


				<tr >
					<td width="400" align="center">Tanda Tangan Siswa</td>
					<td width="240" align="center">Jakarta, <?php echo date('d F Y',strtotime($spp->tgl_bayar)) ?>
					<br>
					Staff Keuangan
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td  align="center"><?php echo $spp->nama ?></td>
					<td align="center">( Nama Keuangan )</td>
				</tr>
			</table>
			</div>


			</td>
		</tr>
	</table>
</body>
</html>