<?
include("koneksi.php");

$a=$_POST['nama'];
$b=$_POST['perusahaan'];
$c=$_POST['alamat'];
$d=$_POST['telp'];
$e=$_POST['email'];
$id=$_POST['id'];

$edit=mysql_query("update m_supplier set nama_supp='$a',perusahaan='$b',alamat='$c',no_telp='$d',email='$e' where id='$id'");
if ($edit)
{
	?>
		<script>
			alert("Supplier berhasil dirubah");
			window.location="apotek.php"
		</script>
	<?
}
else
echo mysql_error();
?>	