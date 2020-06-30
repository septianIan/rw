<?
	include("koneksi.php");
	
	$id=$_GET['id'];

	$antrikan= mysql_query("update m_pasien set antriKlinik='0' where id='$id'");
	if ($antrikan)
	{
		?>
			<script>
				alert("Pasien Dibatalkan")
				window.location="index.php"
			</script>
		<?
	}
	else	
	{
		echo mysql_error();
	}
?>