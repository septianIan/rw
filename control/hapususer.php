<?
	error_reporting(E_ALL^ E_DEPRECATED);
	include("koneksi.php");
	
	$hapus=mysql_query("delete from user where id='$_GET[id]'");
	if($hapus)
	{
		?>
			<script>
				window.location="control.php";
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