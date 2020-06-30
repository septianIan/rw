<?
error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="admin")
{
	?>
		<script>
			alert("Gagal Login...!");
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
							</div>
							<!-- /.sidebar-collapse -->
						</div>						<!-- /.navbar-static-side -->
					</nav>
					<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">
						<div style="border:solid 5px #ccc;margin:0px 0 0 -20px;height:635px;width:1090px;">
							<div style="margin:-550px 0 0 285px;">
								<div class="modal fade" id="myModal1" role="dialog">
										<div class="modal-dialog" style="font-variant:small-caps;">
										<!-- Modal content-->
											<div align=center class="modal-content" style="width:340px;">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Tambah Pasien</h4>
												</div>
												<form method="POST" action="Spasien.php">
													<table style="font-size:12px;"><b>
														<tr>
															<td style="font-weight:bold;">No.Rm</td>
															<td  style="font-weight:bold;">:</td>
															<td><input type="text" name="a" class="form-control"></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td  style="font-weight:bold;">Nama Orag tua</td>
															<td  style="font-weight:bold;">:</td>
															<td><input type="text" name="b" class="form-control"></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td  style="font-weight:bold;">Nama</td>
															<td  style="font-weight:bold;">:</td>
															<td><input type="text" name="c" class="form-control"></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td  style="font-weight:bold;">Tanggal Lahir</td>
															<td  style="font-weight:bold;">:</td>
															<td><input type="text"  placeholder="tahun-bulan-tanggal" name="d" class="form-control"></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td  style="font-weight:bold;">Jenis Kelamin</td>
															<td  style="font-weight:bold;">:</td>
															<td>
																<select name="jk" class="form-control">
																	<option></option>
																	<option>Laki-Laki</option>
																	<option>Perempuan</option>
																</select>
															</td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td  style="font-weight:bold;">Alamat</td>
															<td  style="font-weight:bold;">:</td>
															<td><input type="text" name="f" class="form-control"></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td><input type="submit" name="simpan" value="simpan" class="btn btn-outline btn-success" style="float:right;"></td>
														</tr>
													</table>
												</form>
													<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								<div class="row">
									<div class="col-lg-5" style="width:600px;heigth:350px;">
										<div class="panel panel-info"  style="margin:60px 0 50px -290px;">
												<div class="panel-heading" style="font-variant:small-caps;font-weight:bold;">
													<button type="button" class="btn btn-outline btn-default" style="margin:5px 0 0 0px;float:right;" data-toggle="modal" data-target="#myModal1">+ Tambah pasien</button>
													
													<h4 style="text-align:center;">List Pasien</h4>
												</div>
											<div class="panel-body"  style="height:550px;width:850px;overflow:auto;x;overflow:scroll;">
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
													<thead>
														<tr style="height:40px;border-bottom:solid 1px #ccc;background:#efefef;text-align:Center;font-weight:bold;color:red;">
															<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
															<td style="width:20px;border-right:solid 1px #ccc;font-size:12px;">No.Rm</td>
															<td style="width:250px;border-right:solid 1px #ccc;font-size:12px;">Nama</td>
															<td style="width:250px;border-right:solid 1px #ccc;font-size:12px;">Nama Orang Tua</td>
															<td style="width:50px;border-right:solid 1px #ccc;font-size:12px;">Tanggal Lahir</td>
															<td style="width:50px;border-right:solid 1px #ccc;font-size:12px;">Jenis Kelamin</td>
															<td style="width:120px;border-right:solid 1px #ccc;font-size:12px;">Alamat</td>
															<td style="width:-55px;border-right:solid 1px #ccc;font-size:12px;">Skin Care</td>
															<td style="width:-55px;border-right:solid 1px #ccc;font-size:12px;">Klinik</td>
															<td style="width:100px;border-right:solid 1px #ccc;font-size:12px;">Hapus</td>
															<td style="width:100px;border-right:solid 1px 	#ccc;font-size:12px;">Edit</td>
														</tr>
														</thead>
														<tbody>
															<?
																$no=1;
																$nama= mysql_query("select * from m_pasien order by nama asc");
																while ($a_nama= mysql_fetch_array($nama))
																{																	
																		?>
																		
																		<tr style="height:30px;border-bottom:solid 1px #ccc;">
																			<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
																			<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['no_rm'];?></td>
																			<td style="text-align:left;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['nama'];?></td>
																			<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['nama_ortu'];?></td>
																			<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['tgl_lahir'];?></td>
																			<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['jk'];?></td>
																			<td style="text-align:Center;font-size:11px;border-right:solid 1px #ccc;"><?echo $a_nama['alamat'];?></td>
																			<td style="border-right:solid 1px #ccc;">
																				<?
																					if($a_nama ['antrikan'] == '0')
																					{	
																						?>
																							<button class="btn btn-outline btn-success" style="title:pasien;" onclick="window.location='antrikan.php?id=<?echo $a_nama['id']?>'"><font>Antrikan</font></button>
																						<?
																					}
																					else
																					{	
																						?>
																							<button class="btn btn-danger" style="title:pasien;" onclick="window.location='batalSkincare.php?id=<?echo $a_nama['id']?>'"><font>Batalkan</font></button>
																						<?
																					}	
																				?>
																			</td>
																			<td>
																				<?
																					if($a_nama ['antriKlinik'] == '0')
																					{	
																						?>
																							<button class="btn btn-outline btn-primary" style="title:pasien;" onclick="window.location='antriKlinik.php?id=<?echo $a_nama['id']?>'"><font>Antrikan</font></button>
																						<?
																					}
																					else
																					{	
																						?>
																							<button class="btn btn-danger" style="title:pasien;" onclick="window.location='batalkan.php?id=<?echo $a_nama['id']?>'"><font>Batalkan</font></button>
																						<?
																					}	
																				?>
																			</td>
																			<td style="border-right:solid 1px #ccc;">
																				<a href="hapuspasien.php?id=<?php echo $a_nama['id'];?>" onclick="javascript:var 	y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false"><button style="margin:0 0 0 5px;color;black;" class="btn btn-outline btn-default">Hapus</button></a>
																			</td>
																			<td>
																				<button style="margin:0 0 0 10px;color:blue;" class="btn btn-outline btn-default" onclick="window.location='index.php?edit=<?echo $a_nama['id'];?>'">Edit</button>
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
									<div class="col-lg-4"  style="margin:-663px 0 0 575px;width:300px;">
										<div class="panel panel-success">
											<div class="well well-sm" style="font-family:italic;text-align:center;">
												<a href="index.php">
													<h3 class="fa fa-refresh fa-fw" style="float:left;margin:13px 0 0 0;">(Refresh)	</h3>
												</a>
												<h4 style="font-variant:small-caps;">Edit pasien</h4>
											</div>
											<div class="panel-body" style="height:530px;overflow:auto;x">
											<?
												error_reporting(E_ALL ^ E_DEPRECATED);
												if(isset($_GET['edit']))
												{
													?>													
													<form method="POST" action="Epasien.php">
														<table style="font-variant:small-caps;">
															<?php
																$pasien=mysql_query("select*from m_pasien where id='$_GET[edit]'");
																$a_pasien=mysql_fetch_array($pasien);
															?>
															<tr>
																<input type="hidden" name="id" value="<?php echo $a_pasien['id']?>" class="form-control"></td>
															</tr>
															<tr style="font-size:11px;">
																<td>No.RM</td>
																<td>:</td>
																<td><input type="text" name="a" class="form-control" style="font-size:11px;" value="<?echo $a_pasien['no_rm']?>"></td>
															</tr>
															<tr style="height:15px;"></tr>
															<tr style="font-size:11px;">
																<td>Orang Tua</td>
																<td>:</td>
																<td><input type="text" name="b" class="form-control" style="font-size:11px;" value="<?echo $a_pasien['nama_ortu']?>"></td>
															</tr>
															<tr style="height:15px;"></tr>
															<tr style="font-size:11px;">
																<td>Nama</td>
																<td>:</td>
																<td><input type="text" name="c" class="form-control" style="font-size:11px;" value="<?echo $a_pasien['nama']?>"></td>
															</tr>
															<tr style="height:15px;"></tr>
															<tr style="font-size:11px;">
																<td>Tgl.Lahir</td>
																<td>:</td>
																<td><input type="text" placeholder="tahun-bulan-tanggal" style="font-size:11px;" name="d" class="form-control" value="<?echo $a_pasien['tgl_lahir']?>"></td>
															</tr>
															<tr style="height:15px;"></tr>
															<tr style="font-size:11px;">
																<td>Jenis Kelamin</td>
																<td>:</td>
																<td><select name="e" value="<?echo $a_pasien['jk']?>" class="form-control" style="font-size:11px;">
																	<option><?echo $a_pasien['jk'];?></option>
																	<option value="laki-Laki">laki-Laki</option>
																	<option value="perempuan">perempuan</option>
																	</select>
																</td>
															</tr>
															<tr style="height:15px;"></tr>
															<tr style="font-size:11px;">
																<td>Alamat</td>
																<td>:</td>
																<td><input type="text" name="f" class="form-control" style="font-size:11px;" value="<?echo $a_pasien['alamat']?>">
																</td>
															</tr>
															<tr style="font-size:11px;">
																<td>
																	 <input type="submit" name="simpan" value="Simpan" class="btn btn-outline btn-success">
																</td>
															</tr>
														</table>
														</table>	
													</form>
													<?
												}
											?>		
											</div>
										</div>	
									</div>		
								</div>
							</div>
							<div class="row">
							
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