<?
 include ("koneksi.php");
 
 $idAntri=$_POST['idAntri'];
 $idPasien=$_POST['idPasien'];
 $h=$_POST['j'];
 $i=$_POST['k'];
 $j=$_POST['m'];
 $tglPeriksa=$_POST['tglPeriksa'];
 $umur=$_POST['umur'];
 
 $simpan = mysql_query("insert into tbl_skincare (id_pasien,anamnesa,treatment,keterangan,tgl_periksa,umur) value ('$idPasien','$h','$i','$j','$tglPeriksa','$umur')");
 if($simpan)
 {
	$update = mysql_query("update antrian set s_priksa='1' where id='$idAntri'");
	if($update)
	{
		 ?>
			<script>
				alert("Berhasil");
				window.location="skinCare.php";
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