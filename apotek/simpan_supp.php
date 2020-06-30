<?
	include("koneksi.php");
	
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	
	$simpan =mysql_query("insert into m_supplier(nama_supp,perusahaan,alamat,no_telp,email) value ('$a','$b','$c','$d','$e')");
	if ($simpan)
	{
		?>
			<script>
				alert("Supplier berhasil ditamabahkan");
				window.location="apotek.php"
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>