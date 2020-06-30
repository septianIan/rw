<?
 include("koneksi.php");
 
 $a=$_POST['kode'];
 $b=$_POST['diagnosa'];
 
 $simpan= mysql_query("insert into m_diagnosa(kode,diagnosa) value ('$a','$b')");
 if ($simpan)
 {
	 ?>
		<script>
			alert("Diagnosa Berhasil Ditambahkan");
			window.location="m_diagnosa.php"
		</script>
	 <?
 }
 else
 {
	 echo mysql_error();
 } 
?>