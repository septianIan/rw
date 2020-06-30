<?
include("koneksi.php");

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f=$_POST['f'];
$id=$_POST['id'];

$edit=mysql_query("update m_pasien set no_rm='$a',nama_ortu='$b',nama='$c',tgl_lahir='$d',jk='$e',alamat='$f' where id='$id'");
if ($edit)
{
	?>
		<script>
			alert("Pasien berhasil dirubah");
			window.location="index.php"
		</script>
	<?
}
else
echo mysql_error();
?>