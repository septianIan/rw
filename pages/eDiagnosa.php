<?
 include("koneksi.php");
 
	$a=$_POST['kode'];
	$b=$_POST['diagnosa'];
	$id=$_POST['id'];
	
	$update= mysql_query("update m_diagnosa set kode='$a',diagnosa='$b' where id='$id'");
	if($update)
	{
		?>
			<script>
				alert("Diagnosa berhasil dirubah");
				window.location="m_diagnosa.php";
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>	
