<?
	include("koneksi.php");
		
	$id = $_POST['id'];
	$id_pasien =$_POST['id_pasien'];
	
	$update= mysql_query("update tbl_skincare set  status='1' where id='$id'");
	if ($update)
	{
		$update= mysql_query("update m_pasien set antrikan='0' where id='$id_pasien'");
		if ($update)
		{
			?>
				<script>
					alert("Berhasil");
					window.location="detSkincare.php";
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
	