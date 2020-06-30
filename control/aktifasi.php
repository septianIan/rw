<?
include("koneksi.php");
$id=$_GET['id'];

$update= mysql_query("update user set aktifasi='1' where id='$id'");
if($update)
	{
		?>
			<script>
				alert("Berhasil diaktifasi")
				window.location="control.php"
			</script>
		<?
	}
	else	
	{
		echo mysql_error();
	}
?>