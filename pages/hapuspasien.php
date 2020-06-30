<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include("koneksi.php");
	
	$hapus=mysql_query("delete from m_pasien where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="index.php";
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