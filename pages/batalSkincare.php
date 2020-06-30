<?
	include("koneksi.php");
	
	$id=$_GET['id'];

	$antrikan= mysql_query("update m_pasien set antrikan='0' where id='$id'");
	if ($antrikan)
	{
		$hapus = mysql_query("delete from antrian where id_pasien='$_GET[id]'");
		if($hapus)
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
	}
	else	
	{
		echo mysql_error();
	}
?>