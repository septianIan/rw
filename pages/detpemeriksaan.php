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
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Administator</h3></strong>
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
			<div style="border:solid 5px #ccc;margin:0px 0 0 -20px;height:590px;width:1090px;">
				<div style="margin:-540px 0 0 260px;">
					<div class="row">
						<div class="col-lg-9" style="width:890px;heigth:300px;">
							<div class="panel panel-info"  style="margin:15px 0 50px -265px;">
									<div class="panel-heading" style="font-variant:small-caps;font-weight:bold;">
										<h4 style="text-align:center;">List selesai pemeriksaan</h4>
									</div>
								<div class="panel-body"  style="height:500px;overflow:auto;x">
									<table style="font-variant:small-caps;font-weight:bold;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr style="height:40px;border-bottom:solid 1px #ccc;background:#efefef;text-align:Center;font-weight:bold;color:red;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">No.RM</td>
												<td style="width:350px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">NAMA</td>
												<td style="width:75px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">NIK</td>
												<td style="width:150px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">TGL.LAHIR</td>
												<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">JENIS KELAMIN</td>
												<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">ALAMAT</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">DIAGNOSA</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">TERAPI</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">TINDAKAN</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">BAYAR</td>
											</tr>
											</thead>
											<tbody>
												<?
													$no=1;
													$periksa= mysql_query("select * from m_periksa where bayar='0' order by id asc");
													while ($a_periksa= mysql_fetch_array($periksa))
													{																	
														$nama= mysql_query("select * from m_pasien where id='$a_periksa[id_pasien]'");
														$a_nama= mysql_fetch_array($nama);
															?>
															
															<tr style="height:30px;border-bottom:solid 1px #ccc;">
																<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['no_rm'];?></td>
																<td style="text-align:left;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['nama'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['nik'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['tgl_lahir'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['jk'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_nama['alamat'];?></td>	
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_periksa['diagnosa'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_periksa['terapi'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_periksa['tindakan'];?></td>
																<td style="border-right:solid 1px #ccc;">
																	<button type="button" class="btn btn-outline btn-success" onclick="window.location='print.php?id=<?echo $a_periksa['id'];?>'">
																	Bayar	
																	</button>
																</td>
															</tr>
														<?
													}
												?>
											</tbody>
										</table>	
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<?
					error_reporting(E_ALL ^ E_DEPRECATED);
					if(isset($_GET['edit']))
					{
						?>
								<div class="col-lg-4"  style="margin:-245px 0 0 10px;width:300px;">
									<div class="panel panel-success">
										<div class="panel-heading" style="font-family:italic;text-align:center;">
											Edit pasien
										</div>
										<div class="panel-body" style="height:195px;overflow:auto;x">
											<form method="POST" action="Epasien.php">
												<table>
													<?php
														$pasien=mysql_query("select*from m_pasien where id='$_GET[edit]'");
														$a_pasien=mysql_fetch_array($pasien);
													?>
													<tr>
														<input type="hidden" name="id" value="<?php echo $a_pasien['id']?>" class="form-control"></td>
													</tr>
													<tr>
														<td>No.RM</td>
														<td>:</td>
														<td><input type="text" name="a" class="form-control" value="<?echo $a_pasien['no_rm']?>"></td>
													</tr>
													<tr style="height:3px;"></tr>
													<tr>
														<td>NIK</td>
														<td>:</td>
														<td><input type="text" name="b" class="form-control" value="<?echo $a_pasien['nik']?>"></td>
													</tr>
													<tr style="height:3px;"></tr>
													<tr>
														<td>Nama</td>
														<td>:</td>
														<td><input type="text" name="c" class="form-control" value="<?echo $a_pasien['nama']?>"></td>
													</tr>
													<tr style="height:3px;"></tr>
													<tr>
														<td>Tgl.Lahir</td>
														<td>:</td>
														<td><input type="text" placeholder="tahun-bulan-tanggal" name="d" class="form-control" value="<?echo $a_pasien['tgl_lahir']?>"></td>
													</tr>
													<tr style="height:3px;"></tr>
													<tr>
														<td>Jenis Kelamin</td>
														<td>:</td>
														<td><select name="e" value="<?echo $a_pasien['jk']?>" class="form-control">
															<option><?echo $a_pasien['jk'];?></option>
															<option value="laki-Laki">laki-Laki</option>
															<option value="perempuan">perempuan</option>
															</select>
														</td>
													</tr>
													<tr style="height:3px;"></tr>
													<tr>
														<td>Alamat</td>
														<td>:</td>
														<td><input type="text" name="f" class="form-control" value="<?echo $a_pasien['alamat']?>">
														</td>
													</tr>
													<tr>
														<td>
															 <input type="submit" name="simpan" value="Simpan" class="btn btn-outline btn-success">
														</td>
													</tr>
												</table>
												</table>	
											</form>
										</div>
									</div>	
								</div>	
						<?
					}
				?>
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