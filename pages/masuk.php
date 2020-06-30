<?
	include("koneksi.php");
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$cek = mysql_query("select * from user where username='$username' and password='$password'");
	$r_cek = mysql_num_rows($cek);
	$a_cek= mysql_fetch_array($cek);
	
	if($r_cek == 0)
	{
		?>
			<script type="text/javascript">
				alert("Tidak ditemukan user dengan akun tersebut...!");
				window.location = "login.php";
			</script>
		<?
	}
	else
	{
		$aktif = $a_cek['jabatan'];
		if ($aktif == "admin")
		{
			session_start();
			$_SESSION['jabatan']= $a_cek['jabatan'];
			?>
				<script>
					alert("Selamat Datang");
					window.location="index.php"
				</script>
			<?
		}
		elseif
		($a_cek['jabatan']=='dokter')
		{
			session_start();
			$_SESSION['jabatan']= $a_cek['jabatan'];
			?>
				<script>
					alert("Selamat Datang");
					window.location="index2.php"
				</script>
			<?
		}
		elseif
		($a_cek['jabatan']=='apoteker')
		{
			session_start();
			$_SESSION['jabatan']= $a_cek['jabatan'];
			?>
				<script>
					alert("Selamat Datang");
					window.location="../apotek/apotek.php"
				</script>
			<?
		}
		elseif
		($a_cek['jabatan']=='administator')
		{
			session_start();
			$_SESSION['jabatan']= $a_cek['jabatan'];
			?>
				<script>
					alert("Selamat Datang ADMINISTATOR");
					window.location="../control/control.php"
				</script>
			<?
		}
		elseif
		($a_cek['jabatan']=='skincare')
		{
			session_start();
			$_SESSION['jabatan']= $a_cek['jabatan'];
			?>
				<script>
					alert("Selamat Datang");
					window.location="skinCare.php"
				</script>
			<?
		}
		else
		{	
			?>
				<script>
					alert("User status tidak aktif...!");
					window.location="login.php";
				</script>
			<?
		}
	}	
	
?>