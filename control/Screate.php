<?
include("koneksi.php");

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['jk'];
$f=$_POST['f'];
$g=$_POST['g'];
$h=$_POST['h'];

$simpan= mysql_query("insert into user (nik,nama,alamat,tgl_lahir,jk,username,password,jabatan) value ('$a','$b','$c','$d','$e','$f','$g','$h')");
 if ($simpan)
 {
	 ?>
		<script>
			alert("User berhasil ditambahkan");
			window.location="control.php";
		</script>
	 <?
 }
 else
 echo mysql_error();
?>