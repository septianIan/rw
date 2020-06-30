<?
	include("koneksi.php");
	
	$idPasien = $_POST['idPasien'];
	$idKlinik = $_POST['idKlinik'];
	$anamnesa = $_POST['anamnesa'];
	$k = $_POST['k'];
	$l = $_POST['l'];
	$m = $_POST['m'];
	
	$simpanPemeriksaan = mysql_query("insert into m_periksa (id_pasien,id_klinik,anamnesa,diagnosa,tindakan,terapi) values('$idPasien','$idKlinik','$anamnesa','$k','$l','$m')");
	if ($simpanPemeriksaan)
	{
		$antri= mysql_query("update klinik set status='2' where id='$idKlinik'");
		if ($antri)
		{
			?>
				<script>
					alert("Berhasil Diperiksa")
					window.location="index2.php"
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
