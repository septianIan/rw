<?
	include("koneksi.php");
	
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	$f=$_POST['f'];
	$g=$_POST['g'];
	$h=$_POST['h'];
	$i=$_POST['i'];
	$j=$_POST['j'];
	$k=$_POST['k'];
	$n=$_POST['n'];
	$o=$_POST['o'];
	$p=$_POST['p'];
	$tgl=$_POST['tgl'];
	
	
	$simpan =mysql_query("insert into barang_masuk(nama_obat,pabrik,no_batch,harga_beli,harga_jual,stok_awal,nominalstok_awal,penerimaan,nominal_penerimaan,pengeluaran,nominal_pengeluaran,stok_akhir,nominal_stokakhir,expired,tgl_beli) value ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$n','$o','$p','$tgl')");
	if ($simpan)
	{
		?>
			<script>
				alert("Barang berhasil ditamabahkan");
				window.location="pembelian_bar.php"
			</script>
		<?
	}
	else
	{
		echo mysql_error();
	}	
?>