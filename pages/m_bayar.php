<?
	include("koneksi.php");
		
	$id = $_POST['id'];
	$id_pasien =$_POST['id_pasien'];
	
	$update= mysql_query("update m_periksa set  bayar='1' where id='$id'");
	if ($update)
	{
		$update= mysql_query("update m_pasien set antriKlinik='0' where id='$id_pasien'");
		if ($update)
		{
			?>
				<script>
					alert("berhasil");
					window.location="detpemeriksaan.php";
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
	