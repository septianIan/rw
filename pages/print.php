<?
	if(isset($_GET['id']))
	{
		?>
			<html>
<?	
	include("koneksi.php");
?>	
	<head>
		<title>Cetak Struk</title>
		<style>
			@media print{
				#input, #print, #bayar {
					display:none;
				}
			}
		</style>
		<script type="text/javascript">
		  function openWin()
		  {
			myWindow=window.open('','','width=200,height=100');
			myWindow.document.write("<p>This is 'rw/pages/print.php'</p>");
			myWindow.focus();
			myWindow.print(); //DOES NOT WORK
		  }
		</script>
	</head>
	<div>
		<body>
			<?
				$periksa= mysql_query("select * from m_periksa where id='$_GET[id]'");
				$a_periksa= mysql_fetch_array($periksa);
				
				$pasien= mysql_query("select * from m_pasien where id='$a_periksa[id_pasien]'");
				$a_pasien= mysql_fetch_array($pasien);
				
				$klinik = mysql_query("select * from klinik where id_pasien='$a_periksa[id_pasien]'");
				$a_klinik= mysql_fetch_array($klinik);
			?>
					<form method="POST" action="m_bayar.php">
						<input type="hidden" name="id" value="<?echo $a_periksa['id'];?>">
						<input type="hidden" name="id_pasien" value="<?echo $a_periksa['id_pasien'];?>">
						<table>
							<tr>
								<td>No.Rm</td>
								<td>:</td>
								<td><?echo $a_pasien['no_rm'];?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?echo $a_pasien['nama'];?></td>
							</tr>
							<tr>
								<td>Jenis kelamin</td>
								<td>:</td>
								<td><?echo $a_pasien['jk'];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?echo $a_pasien['alamat'];?></td>
							</tr>
							<tr>
								<td>Berat Badan</td>
								<td>:</td>
								<td><?echo $a_klinik['berat_badan'];?></td>
							</tr>
							<tr>
								<td>Tekanan Darah</td>
								<td>:</td>
								<td><?echo $a_klinik['tekanan_darah'];?></td>
							</tr>
							<tr>
								<td>Anamnesa</td>
								<td>:</td>
								<td><?echo $a_periksa['anamnesa'];?></td>
							</tr>
							<tr>
								<td>Diagnosa</td>
								<td>:</td>
								<td><?echo $a_periksa['diagnosa'];?></td>
							</tr>
							<tr>
								<td>Terapi</td>
								<td>:</td>
								<td><?echo $a_periksa['terapi'];?></td>
							</tr>
							<tr>
								<td>Tindakan</td>
								<td>:</td>
								<td><?echo $a_periksa['tindakan'];?></td>
							</tr><tr>
								<td>Tanggal Periksa</td>
								<td>:</td>
								<td><?echo $a_periksa['tanggal'];?></td>
							</tr>
							<tr>
								<td>
								<input type="button" value="Print This Page" onClick="window.print()" id="print"/>
								<input type="submit" name="simpan" value="simpan">
							</td>
						</table>	
					</form>
					<?
				
			?>
		</body>
	</div>	
</html>

		<?
	}
?>