<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include("koneksi.php");
	
	$hapus=mysql_query("delete from barang_masuk where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="pembelian_bar.php";
			</script>
		<?
	}
	else
	{
		?>
			<script>
				alert("Gagal mengahpus");
			</script>
		<?
	}
?>