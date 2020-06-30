<?
include("koneksi.php");
$id=$_GET['id'];

$update= mysql_query("update user set aktifasi='0' where id='$id'");
if($update)
	{
		?>
			<script>
				alert("User di Nonaktifkan")
				window.location="control.php"
			</script>
		<?
	}
	else	
	{
		echo mysql_error();
	}
?>