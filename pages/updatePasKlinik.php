<?
include("koneksi.php");

$id = $_GET['id'];

$update = mysql_query("update klinik set status='1' where id='$_GET[id]'");
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
?>