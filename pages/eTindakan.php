<?
 include("koneksi.php");
 
	$a=$_POST['tindakan'];
	$b=$_POST['harga'];
	$id=$_POST['id'];
	
	$update= mysql_query("update m_tindakan set tindakan='$a',harga='$b' where id='$id'");
	if($update)
	{
		?>
			<script>
				alert("Tindakan berhasil dirubah");
				window.location="m_tindakan.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>	
