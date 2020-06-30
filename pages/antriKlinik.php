<?
	include("koneksi.php");
	
	$id=$_GET['id'];
	//MENCARI NOMER ANTRIAN TERAKHIR
	$antrikan= mysql_query("update m_pasien set antriKlinik='1' where id='$id'");
	if ($antrikan)
	{
		?>
			<script>
				alert("Berhasil diantrikan")
				window.location="klinik.php"
			</script>
		<?
	}
	else	
	{
		echo mysql_error();
	}
?>