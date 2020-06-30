<?
include("koneksi.php");

$a=$_POST['a'];
$b=$_POST['supp'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f=$_POST['f'];
$g=$_POST['g'];
$h=$_POST['h'];
$i=$_POST['i'];
$j=$_POST['j'];
$k=$_POST['k'];
$l=$_POST['l'];
$m=$_POST['m'];
$n=$_POST['n'];
$o=$_POST['o'];
$id=$_POST['id'];

$edit=mysql_query("update barang_masuk set nama_obat='$a',pabrik='$b',no_batch='$c',harga_beli='$d',harga_jual='$e',stok_awal='$f',nominalstok_awal='$g',penerimaan='$h',nominal_penerimaan='$i',pengeluaran='$j',nominal_pengeluaran='$k',stok_akhir='$l',nominal_stokakhir='$m',expired='$n',tgl_beli='$o' where id='$id'");
if ($edit)
{
	?>
		<script>
			alert("Barang berhasil dirubah");
			window.location="pembelian_bar.php"
		</script>
	<?
}
else
echo mysql_error();
?>	