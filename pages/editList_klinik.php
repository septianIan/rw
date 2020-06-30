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
	
	$id=$_POST['id'];
	
	$update= mysql_query("update klinik set id_pasien='$id_pasien',no_rm='$a',nama='$b',alamat='$c',umur='$d',tgl_lahir='$e',tgl_periksa='$f',jam_periksa='$g',berat_badan='$h',tekanan_darah='$i'  where id='$id'");
	if($update)
	{
		?>
			<script>
				alert("Diagnosa berhasil dirubah");
				window.location="klinik.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>	
