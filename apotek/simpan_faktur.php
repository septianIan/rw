<?
	include("koneksi.php");
	date_default_timezone_set('Asia/Jakarta');
	
	if($_GET['process'] == "ambilNoFaktur")
	{
		$noFaktur = $_POST['noFaktur'];
		$tgl = date("Y-m-d H:i:S");
		
		$insert = mysql_query("insert into faktur_jual(no_faktur,tgl_transaksi) values ('$noFaktur','$tgl')");
		if($insert)
		{
			?>
				<script>
					alert("No.Faktur berhasil diambil");
					window.location = "penjualan.php?noFaktur=<?echo $noFaktur?>";
				</script>
			<?
		}

		else
		{
			?>
				<script>
					alert("Gagal ambil no.faktur");
					window.location = "penjualan.php";
				</script>
			<?
		}
	}
	
	elseif($_GET['process'] == "bayarFaktur")
	{
		$noFaktur = $_POST['noFaktur'];
		$total = $_POST['jumBeli'];
		$dibayar = $_POST['dibayar'];
		$url = $_POST['url'];
		
		$update = mysql_query("update faktur_jual set total='$total', dibayar='$dibayar', status='1' where no_faktur='$noFaktur'");
		if($update)
		{
			?>
				<script>
					alert("Berhasil disimpan");
					//print nota penjualan
					window.location = "penjualan.php";
				</script>
			<?
		}
		
		else
		{
			?>
				<script>
					alert("Gagal menyimpan pembayaran");
					window.location = "<?echo $url?>";
				</script>
			<?
		}
	}
	
	else
	{
		?>
			<script>
				alert("Proses tidak diketahui");
				window.location = "penjualan.php";
			</script>
		<?
	}
?>