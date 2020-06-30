<?
	include("koneksi.php");
	
	$a=$_POST['tindakan'];
	$b=$_POST['harga'];
	
	$simpan= mysql_query ("insert into m_tindakan(tindakan,harga) value ('$a','$b')");
	if ($simpan)
		{
			?>
				<script>
					alert("Tindakan Berhasil Ditambahkan");
					window.location="m_tindakan.php";
				</script>
			<?
		}
		else
		{
			echo mysql_error();
		}	
?>