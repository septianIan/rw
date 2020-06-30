<?
error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="dokter")
	{
		?>
			<script>
				alert("Gagal login...!!!");
				window.location="login.php";
			</script>
		<?
	}
	else
	{
		?>
			<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet"><tr style="border-bottom:solid 1px black;">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?
		include("koneksi.php");
	?>
</head>

<body>
	
    <div id="wrapper"  style="background:white;">

        <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background:white;">
			<div class="navbar-header">
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Dashboard Dokter</h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="logout.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';;">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
					<ul class="nav" id="side-menu">
						<li>
							<a href="index2.php" style="font-size:15px;"><img src="img/dokter.png" height="35px" width="35px"><b> Tampilan Dokter</a></b>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>						<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">			
			<div style="margin:0 0 0 10px;">
				<div class="row" style="margin:5px 0 0 -45px;width:1500px;height:250px;">
					<div class="col-lg-5" style="margin:0 0 10px 0px;">
						<div class="well well-sm" style="margin:10px 0 0 0;">
							<h1 style="text-align:center;font-family:'italic';color:red;">List Pasien Klinik</h1>
							<div class="panel-body" style="height:460px;overflow:auto;x:">
								<?
									$klinik = mysql_query("select * from klinik where status='1' order by id desc");
									$a_klinik = mysql_fetch_array($klinik);
								?>
								<form method="POST" action="periksa.php">
									<table style="font-size:11px;font-variant:small-caps;font-weight:bold;width:50%;">
										<input type="hidden" name="idKlinik" value="<?echo $a_klinik['id'];?>">
										<input type="hidden" name="idPasien" value="<?echo $a_klinik['id_pasien'];?>">
										<tr>
											<td>No RM</td>
											<td>:</td>
											<td><input type="text" name="a" class="form-control" value="<?echo $a_klinik['no_rm'];?>" readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><input type="text" name="b" class="form-control" value="<?echo $a_klinik['nama'];?>"readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><input type="text" name="c" class="form-control" value="<?echo $a_klinik['alamat'];?>"readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Umur</td>
											<td>:</td>
											<td><input type="text" name="d" class="form-control" value="<?echo $a_klinik['umur'];?>"readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Tanggal Lahir</td>
											<td>:</td>
											<td><input type="text" name="e" class="form-control" value="<?echo $a_klinik['tgl_lahir'];?>" readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Tanggal Periksa</td>
											<td>:</td>
											<td><input type="text" name="f" class="form-control" value="<?echo $a_klinik['tgl_periksa'];?>" readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Jam Periksa</td>
											<td>:</td>
											<td><input type="text" name="g" class="form-control" value="<?echo $a_klinik['jam_periksa'];?>" readonly></td>
										</tr>
									</table>
									<table style="margin:-270px 150px 0 280px;font-size:11px;font-weight:bold;font-variant:small-caps;width:40px;">
										<tr>
											<td>Berat Badan</td>
											<td>:</td>
											<td><input type="text" name="h" class="form-control" value="<?echo $a_klinik['berat_badan'];?>" readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Tekanan Darah</td>
											<td>:</td>
											<td><input type="text" name="i" class="form-control" value="<?echo $a_klinik['tekanan_darah'];?>" readonly></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Anamnesa</td>
											<td>:</td>
											<td><input type="text" name="anamnesa" class="form-control"></td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Diagnosa</td>
											<td>:</td>
											<td>
												<input type="text" name="k" class="form-control">
											</td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Tindakan</td>
											<td>:</td>
											<td>
												<input type="text" name="l" class="form-control">
											</td>
										</tr>
										<tr style="height:5px;"></tr>
										<tr>
											<td>Terapi</td>
											<td>:</td>
											<td><textarea input type="text" name="m"></textarea></td>
										</tr>
										<tr>
											<td>
											<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
											</td>
										</tr>
									</table>
								</form>
								<!-- button --->
								<button class="btn btn-warning" style="margin:-55px 0 0 400px;" onclick="window.location='index2.php?id=<?echo $a_klinik['id'];?>'">Lihar Riwayat Pasien</button>
							</div>
						</div>
					</div>
					<div class="col-lg-7" style="margin:10px 0 0 -20px;width:545px;">
						<div class="panel panel-info">
							<div class="panel-heading">
								Riwayat Pasien
							</div>
							<div class="panel-body" style="width:100%;height:500px;overflow:auto;x;overflow:scroll;">
								<?
								if(isset($_GET['id']))
								{
									?>
										<table style="font-size:11px;width:800px;">
											<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#efefef;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;color:red;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:100px;border-right:solid 1px #ccc;">Nama</td>
												<td style="width:350px;border-right:solid 1px #ccc;">Alamat</td>
												<td style="width:100px;border-right:solid 1px #ccc;">umur</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Tgl Lahir</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Tgl Periksa</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Jam Periksa</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Berat Badan</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Tekanan Darah</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Diagnosa</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Tindakan</td>
												<td style="width:175px;border-right:solid 1px #ccc;">Terapi</td>
											</tr>
											<?
												$no=1;
												$abc= mysql_query("select * from klinik where id='$_GET[id]'");
												$a_abc =mysql_fetch_array($abc);
												
												$pasien = mysql_query("select * from m_pasien where id='$a_abc[id_pasien]'");
												$a_pasien = mysql_fetch_array($pasien);
												
												$kill= mysql_query("select * from m_periksa where id_pasien='$a_pasien[id]'");
												while($a_kill =mysql_fetch_array($kill))
												{
													?>
														<tr style="height:30px;border-bottom:solid 1px #ccc;">
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['nama'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['alamat'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['umur'];?></td>

															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['tgl_lahir'];?></td>		
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['tgl_periksa'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['jam_periksa'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['berat_badan'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_abc['tekanan_darah'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['diagnosa'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['tindakan'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['terapi'];?></td>
														</tr>			
													<?	
												}
											?>
										</table>
									<?
									}
									else
									{
										?>
											<img src="img/listKlinik.png" width="300px" height="300px" style="margin:40px 0 0px 100px;">
										<?
									}
								?>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>

    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

		<?
	}	
?>