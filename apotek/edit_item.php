<?
include("koneksi.php");

$a=$_POST['nama'];
$b=$_POST['barang'];
$c=$_POST['satuan'];
$id=$_POST['id'];

$edit=mysql_query("update m_item set nama_item='$a',jenis_bar='$b',satuan='$c' where id='$id'");
if ($edit)
{
	?>
		<script>
			alert("Item berhasil dirubah");
			window.location="apotek.php"
		</script>
	<?
}
else
echo mysql_error();
?>	