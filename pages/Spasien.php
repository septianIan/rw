<?
 include("koneksi.php");
 
 $a=$_POST['a'];
 $b=$_POST['b'];
 $c=$_POST['c'];
 $d=$_POST['d'];
 $jk=$_POST['jk'];
 $f=$_POST['f'];
 
 $simpan =mysql_query("insert into m_pasien(no_rm,nama_ortu,nama,tgl_lahir,jk,alamat) value ('$a','$b','$c','$d','$jk','$f')");
 if ($simpan)
 {
	 ?>
		<script>
			alert("Pasien berhasil ditambahkan");
			window.location="index.php"
		</script>
	 <?
 }
 else
{
	 ?>
		<script>
			alert("Gagal...(data tidak bisa diduplicat)");
			window.location="index.php"
		</script>
	 <?
 }
?>