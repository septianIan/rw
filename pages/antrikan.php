<?
	include("koneksi.php");
	
	$id=$_GET['id'];
	//MENCARI NOMER ANTRIAN TERAKHIR
	$maksAntrian = mysql_query("select max(no_antrian) as noAntri from antrian");
	$a_maksAntrian = mysql_fetch_array($maksAntrian);
	if(empty($a_maksAntrian['noAntri']))
		$nomerAntrian = 1;
	else
		$nomerAntrian = $a_maksAntrian['noAntri'] + 1;
	
	$insert = mysql_query("insert into antrian (no_antrian,id_pasien,s_priksa) values ('$nomerAntrian','$id','0')");
	if($insert)
	{	
		$antrikan= mysql_query("update m_pasien set antrikan='1' where id='$id'");
		if ($antrikan)
		{
			?>
				<script>
					alert("Berhasil diantrikan")
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