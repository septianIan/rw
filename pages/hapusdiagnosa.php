<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include("koneksi.php");
	
	$hapus=mysql_query("delete from m_diagnosa where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="m_diagnosa.php";
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