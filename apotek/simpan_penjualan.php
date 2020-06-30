<?
	include("koneksi.php");
		
	$noFaktur=$_POST['noFaktur'];
	$namaObat=$_POST['namaObat'];
	$harga=$_POST['harga'];
	//$satuan=$_POST['satuan'];
	$jumlah=$_POST['jumlah'];
	$tgl=$_POST['tgl'];
	$id=$_POST['id'];
	$total = $jumlah * $harga;
	
	$simpan= mysql_query("insert into penjualan (no_faktur,nama_item,harga,jumlah,total,tgl_pembelian) value ('$noFaktur','$namaObat','$harga','$jumlah','$total','$tgl')");
	if($simpan)
	{
		$stokAkhir =mysql_query("select * from barang_masuk where id='$id'");
		$a_stokAkhir = mysql_fetch_array($stokAkhir);
		
		$stokBaru = $a_stokAkhir['stok_akhir'] - $jumlah;
		$update= mysql_query("update barang_masuk set stok_akhir='$stokBaru' where id='$id'");
		if ($update)
		{
			?>
				<script>
					alert("Berhasil");
					window.location="<?echo $_POST['url']?>";
				</script>
			<?
		}
		
		else
		{
			?>
				<script>
					alert("Gagal update stok barang masuk");
					window.location="<?echo $_POST['url']?>";
				</script>
			<?
		}
	}
	else
	{
		?>
			<script>
				alert("Gagal menambahkan barang ke daftar pembelian");
				window.location="<?echo $_POST['url']?>";
			</script>
		<?
	}	
?>