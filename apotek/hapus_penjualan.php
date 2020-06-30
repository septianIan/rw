<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include("koneksi.php");
	$noFaktur = $_GET['noFaktur'];
	
	//DATA OBAT
	$sel = mysql_query("select * from penjualan where id='$_GET[id]'");
	$a_sel = mysql_fetch_array($sel);
	$namaObat = $a_sel['nama_item'];
	$jumlah = $a_sel['jumlah'];
	
	$hapus = mysql_query("delete from penjualan where id='$_GET[id]'");
	if($hapus)
	{
		$stok = mysql_query("select * from barang_masuk where nama_obat='$namaObat'");
		$a_stok = mysql_fetch_array($stok);
		
		$kembaliStok = $a_stok['stok_akhir'] + $jumlah;
		
		$update = mysql_query("update barang_masuk set stok_akhir='$kembaliStok' where nama_obat='$namaObat'");
		if($update)
		{
			?>
				<script>
					alert("Berhasil hapus.");
					window.location = "penjualan.php?noFaktur=<?echo $noFaktur?>";
				</script>
			<?
		}
		
		else
		{
			?>
				<script>
					alert("Berhasil hapus. Gagal update.");
					window.location = "penjualan.php?noFaktur=<?echo $noFaktur?>";
				</script>
			<?
		}
	}
	else
	{
		?>
			<script>
				alert("Gagal mengahpus");
				window.location = "penjualan.php?noFaktur=<?echo $noFaktur?>";
			</script>
		<?
	}
?>