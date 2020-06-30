<?
error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="admin")
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
	
	<!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

<body style="background:white;">

    <div id="wrapper" style="background:white;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background:white;">
			<div class="navbar-header">
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Administator </h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="logout.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
					<ul class="nav" id="side-menu">
						<ul class="nav" id="side-menu">
							<li>
								<a href="index.php" style="font-size:15px;"><img src="img/reg.png" height="35px" width="35px"><b> Registrasi</a></b>
							</li>
							<li>
								<a href="klinik.php" style="font-size:15px;"><img src="img/add1.ico" height="35px" width="35px"><b> Pasien klinik</a></b>
							</li>
							<li>
								<a href="detpemeriksaan.php" style="font-size:15px;"><img src="img/icon.png" height="35px" width="35px"><b> List pemeriksaan</a></b>
							</li>
							<li>
								<a href="detSkincare.php" style="font-size:15px;"><img src="img/icon-skin-care.png" height="35px" width="35px"><b> List SkinCare</a></b>
							</li>
						</ul>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>						<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">
			<br><div class="row">
					<div class="col-lg-5">
						<div class="panel panel-success">
							<div class="panel-heading">
								Pasien Klinik
							</div>
							<div class="panel-body" style="height:330px;overflow:auto;x">
								<table style="font-variant:small-caps;font-weight:bold;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr style="height:40px;border-bottom:solid 1px #ccc;background:#efefef;text-align:Center;font-weight:bold;color:red;">
											<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
											<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">No.Rm</td>
											<td style="width:350px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Nama</td>
											<td style="width:150px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Tanggal Lahir</td>
											<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Jenis Kelamin</td>
											<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Action Center</td>
										</tr>
									</thead>
									<tbody>
										<?
											$no=1;
											$nama= mysql_query("select * from m_pasien where antriklinik='1' order by id asc");
											while ($a_nama= mysql_fetch_array($nama))
											{
												?>
													<tr style="height:30px;border-bottom:solid 1px #ccc;">
														<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
														<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['no_rm'];?></td>
														<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['nama'];?></td>
														<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['tgl_lahir'];?></td>
														<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['jk'];?></td>
														<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;">
															<button class="btn btn-outline btn-success" style="title:pasien;" onclick="window.location='klinik.php?id=<?echo $a_nama['id']?>'"><font>Act</font></button>
														</td>
													</tr>
												<?
											}
										?>
									</tbody>		
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="well well-sm" style="height:370px;">
							<h2 style="text-align:center;color:red;font-family:'italic';">Cek Pasien</h2>
								<?
									if(isset($_GET['id']))
									{
										?>
											<?
												$abc = mysql_query("select * from m_pasien where id='$_GET[id]'"); 
												$a_abc = mysql_fetch_array($abc);
											?>
											<form method="POST" action="simpan_klinik.php">
												<table style="font-weight:bold;width:46%;">
													<tr>
														<input type="hidden" name="id_pasien" value="<?echo $a_abc['id'];?>">
														<td>No.Rm</td>
														<td>:</td>
														<td><input type="text" name="a" class="form-control" value="<?echo $a_abc['no_rm'];?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Nama</td>
														<td>:</td>
														<td><input type="text" name="b" class="form-control" value="<?echo $a_abc['nama'];?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Alamat</td>
														<td>:</td>
														<td><input type="text" name="c" class="form-control" value="<?echo $a_abc['alamat'];?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<?php
															$naruto = explode("-",$a_abc['tgl_lahir']);
															$lahir = mktime(0, 0, 0, $naruto[2], $naruto[1], $naruto[0]); //jam,menit,detik,bulan,tanggal,tahun
															$t = time();
															$umur = ($lahir < 0) ? ( $t + ($lahir * -1) ) : $t - $lahir;
															$tahun = 60 * 60 * 24 * 365;
															$tahunlahir = $umur / $tahun;
															$umursekarang=floor($tahunlahir) ;
														?>
														<td>Umur</td>
														<td>:</td>
														<td><input type="text" name="d" class="form-control" value="<?echo $umursekarang?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<?
															date_default_timezone_set('Asia/Jakarta');
														?>
														<td>Tanggal Periksa</td>
														<td>:</td>
														<td><input type="text" name="f" class="form-control" value="<?echo date ("Y-m-d") ?>" readonly></td>
													</tr>
												</table>
												<table style="float:right;margin:-220px 0 0 0;font-weight:bold;">
													<tr>
														<td>Tanggal lahir</td>
														<td>:</td>
														<td><input type="text" name="e" class="form-control" value="<?echo $a_abc['tgl_lahir'];?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Jam Periksa</td>
														<td>:</td>
														<td><input type="text" name="g" class="form-control" value="<?echo date ("H:i:s")?>" readonly></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Barat Badan</td>
														<td>:</td>
														<td><input type="text" name="h" class="form-control" value=""></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Tekanan Darah</td>
														<td>:</td>
														<td><input type="text" name="i" class="form-control" value=""></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>
														<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
														</td>
													</tr>
												</table>
											</form>
										<?
									}
								?>
								<!-- batas-->
								<?
									if(isset($_GET['edit']))
									{
										?>
											<?
												$abc = mysql_query("select * from klinik where id='$_GET[edit]'"); 
												$a_abc = mysql_fetch_array($abc);
											?>
											<form method="POST" action="editList_klinik.php">
												<table style="font-weight:bold;width:46%;">
													<tr>
														<input type="hidden" name="id_pasien" value="<?echo $a_abc['id_pasien'];?>">
														<input type="hidden" name="id" value="<?echo $a_abc['id'];?>">
														<td>No.Rm</td>
														<td>:</td>
														<td><input type="text" name="a" class="form-control" style="background:#7FFFD4;" value="<?echo $a_abc['no_rm'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Nama</td>
														<td>:</td>
														<td><input type="text" name="b" style="background:#7FFFD4;" class="form-control" value="<?echo $a_abc['nama'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Alamat</td>
														<td>:</td>
														<td><input type="text" name="c" style="background:#7FFFD4;" class="form-control" value="<?echo $a_abc['alamat'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Umur</td>
														<td>:</td>
														<td><input type="text" name="d" class="form-control" style="background:#7FFFD4;" value="<?echo $a_abc['umur'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>+
														<td>Tanggal Periksa</td>
														<td>:</td>
														<td><input type="text" name="f" style="background:#7FFFD4;" class="form-control" value="<?echo $a_abc['tgl_lahir'];?>"></td>
													</tr>
												</table>
												<table style="float:right;margin:-220px 0 0 0;font-weight:bold;">
													<tr>
														<td>Tanggal lahir</td>
														<td>:</td>
														<td><input type="text" name="e" style="background:#7FFFD4;" class="form-control" value="<?echo $a_abc['tgl_lahir'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Jam Periksa</td>
														<td>:</td>
														<td><input type="text" name="g" class="form-control" style="background:#7FFFD4;" value="<?echo $a_abc['jam_periksa'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Barat Badan</td>
														<td>:</td>
														<td><input type="text" name="h" class="form-control" style="background:#7FFFD4;" value="<?echo $a_abc['berat_badan'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>Tekanan Darah</td>
														<td>:</td>
														<td><input type="text" name="i" class="form-control" style="background:#7FFFD4;" value="<?echo $a_abc['tekanan_darah'];?>"></td>
													</tr>
													<tr style="height:10px;">
													<tr>
														<td>
														<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
														</td>
													</tr>
												</table>
											</form>
										<?
									}
								?>	
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							List Periksa
						</div>
						<div class="panel-body" style="height:120px;margin:5px 0 0 0;">
							<table style="font-variant:small-caps;font-weight:bold;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr style="height:40px;border-bottom:solid 1px #ccc;background:#efefef;text-align:Center;font-weight:bold;color:red;">
										<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
										<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">No.Rm</td>
										<td style="width:350px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Nama</td>
										<td style="width:150px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Alamat</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Umur</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Tanggal Lahir</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Tanggal Periksa</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Jam Periksa</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Berat Badan</td>
										<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Tekanan Darah</td>
										<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Action Center</td>
										<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">Edit Center</td>
									</tr>
								</thead>	
								<?
									$klinik = mysql_query("select * from klinik where status='0'");
									while($a_klinik = mysql_fetch_array($klinik))
									{
										?>
											<tr style="height:30px;border-bottom:solid 1px #ccc;">
												<input type="hidden" name="id" value="<?echo $a_klinik['id'];?>">
												
												<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['no_rm'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['nama'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['alamat'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['umur'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['tgl_lahir'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['tgl_periksa'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['jam_periksa'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['berat_badan'];?></td>
												<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_klinik['tekanan_darah'];?></td>
												<td>
													<button type="button" class="btn btn-outline btn-success" onclick="window.location='updatePasKlinik.php?id=<?echo $a_klinik['id'];?>'">
													SAVE	
													</button>
												</td>
												<td>
													<button type="button" class="btn btn-outline btn-primary" onclick="window.location='klinik.php?edit=<?echo $a_klinik['id'];?>'">
													EDIT	
													</button>
												</td>
											</tr>
										<?
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
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
	
	<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
	
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

		<?
	}	
?>