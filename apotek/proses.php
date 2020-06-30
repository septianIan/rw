<?
mysql_connect('localhost','root','clusterstorm');
mysql_select_db('coba');
$x = $_POST['username'];
$y = $_POST['password'];

$cek = mysql_query("select * from user where naruto='$x' and sakura='$y'");
$r_cek = mysql_num_rows($cek);
if ($r_cek !=1)
	{
		?>
			<script>
				alert("gagal...!");
				window.location="login.php";
			</script>
		<?
	} 
	else
	echo mysql_error();
?>