<?
	include("koneksi.php");
	
	$id_pasien=$_POST['id_pasien'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	$f=$_POST['f'];
	$g=$_POST['g'];
	$h=$_POST['h'];
	$i=$_POST['i'];

	
	$simpan= mysql_query("insert into klinik (id_pasien,no_rm,nama,alamat,umur,tgl_lahir,tgl_periksa,jam_periksa,berat_badan,tekanan_darah) value ('$id_pasien','$a','$b','$c','$d','$e','$f','$g','$h','$i')");
	if($simpan)
	{
		$update= mysql_query("update m_pasien set antriKlinik='2' where id='$id_pasien'");
		if($update)
		{
			?>
				<script>
					alert("Pasien Diantrikan");
					window.location="klinik.php";
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