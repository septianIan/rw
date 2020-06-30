<?
	include("koneksi.php");
	
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	
	$simpan =mysql_query("insert into m_item(nama_item,jenis_bar,satuan) value ('$a','$b','$c')");
	if ($simpan)
	{
		?>
			<script>
				alert("Item berhasil ditamabahkan");
				window.location="apotek.php"
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>