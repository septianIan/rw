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

<body style="background:white;">
	
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
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
					<ul class="nav" id="side-menu">
						<li>
							<a href="index2.php" style="font-size:15px;"><img src="img/dokter.png" height="35px" width="35px"><b> Tampilan Dokter</a></b>
						</li>
						<li>
							<a href="m_diagnosa.php" style="font-size:15px;"><img src="img/diagnosa.png" height="35px" width="35px"><b> Tambah Diagnosa</a></b>
						</li>
						<li>
							<a href="m_tindakan.php" style="font-size:15px;"><img src="img/tindakan.png" height="35px" width="35px"><b> Tambah Tindakan</a></b>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>						<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">
			<div style="border:solid 5px #ccc;margin:0 0 0 -20px;height:605px;width:1090px;">
				<div style="margin:-5px 0 0 -15px;">
					<div class="row" style="font-width:bold;font-variant:small-caps;">
						<div class="modal fade" id="myModal1" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
								<div align=center class="modal-content" style="width:340px;">
									<div class="modal-header">
										<button type="button" class="btn btn-outline btn-default" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Diagnosa</h4>
									</div>
									<form method="POST" action="sDiagnosa.php">
										<table style="font-size:12px;"><b>
											<tr>
												<td style="font-weight:bold;">KODE</td>
												<td  style="font-weight:bold;">:</td>
												<td><input type="text" name="kode" class="form-control"></td>
											</tr>
											<tr style="height:3px;"></tr>
											<tr>
												<td  style="font-weight:bold;">DIAGNOSA</td>
												<td  style="font-weight:bold;">:</td>
												<td><input type="text" name="diagnosa" class="form-control"></td>
											</tr>
											<tr>
												<td><input type="submit" name="simpan" value="simpan" class="btn btn-outline btn-success" style="float:right;margin:0 0 0 0px;"></td>
											</tr>
										</table>
									</form>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5" style="margin:0 0 10px 10px;width:800px;">
							<div class="panel panel-info" style="margin:10px 0 0 0;">
									<div class="panel-heading" style="font-variant:small-caps;">
										<button type="button" class="btn btn-outline btn-default" style="margin:0 0 0 580px;" data-toggle="modal" data-target="#myModal1">+ Tambah Diagnosa</button>
									</div>
								<div class="panel-body" style="height:535px;overflow:auto;x:;">
									<table style="font-size:12px;">
										<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
											<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
											<td style="width:100px;border-right:solid 1px #ccc;">KODE</td>
											<td style="width:350px;border-right:solid 1px #ccc;">DIAGNOSA</td>
											<td style="width:100px;border-right:solid 1px #ccc;color:blue;">EDIT</td>
											<td style="width:175px;border-right:solid 1px #ccc;color:red;">HAPUS</td>
										</tr>
										<?
											$no=1;
											$kill= mysql_query("select * from m_diagnosa order by diagnosa asc");
											while ($a_kill =mysql_fetch_array($kill))
											{
												?>
													<tr style="height:30px;border-bottom:solid 1px #ccc;">
														<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
														<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['kode'];?></td>
														<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['diagnosa'];?></td>
														<td style="border-right:solid 1px #ccc;">
															<button type="button" class="btn btn-outline btn-primary" style="margin:0 0 0 20px;" onclick="window.location='m_diagnosa.php?edit=<?echo $a_kill['id'];?>'">Edit</button>
														</td>
														<td style="border-right:solid 1px #ccc;">
															<a href="hapusdiagnosa.php?id=<?php echo $a_kill['id'];?>" onclick="javascript:var 		y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false">
																<button type="button" class="btn btn-outline btn-danger" style="margin:0 0 0 40px;">HAPUS</button>
															</a>
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
					
					<div class="col-lg-5" style="margin:-610px 0 10px 770px;width:385px;">
						<div class="panel panel-success" style="margin:10px 0 0 0;">
								<div class="panel-heading" style="font-variant:small-caps;">
								<a href="m_diagnosa.php">
									<h3 class="fa fa-refresh fa-fw" style="float:left;margin:13px 0 0 0;">(Refresh)	</h3>
								</a>
									<h4 style="text-align:center;">Edit diagnosa</h4>
								</div>
							<div class="panel-body" style="height:140px;">
							<?
								error_reporting(E_ALL ^ E_DEPRECATED);
								if (isset($_GET['edit']))
								{
									?>
									<form method="POST" action="eDiagnosa.php">
										<table style="font-size:12px;"><b>
											<?php
												$edit=mysql_query("select*from m_diagnosa where id='$_GET[edit]'");
												$a_edit=mysql_fetch_array($edit);
											?>
											<tr>
												<input type="hidden" name="id" value="<?php echo $a_edit['id']?>" class="form-control"></td>
											<tr>
												<td>KODE</td>
												<td>:</td>
												<td><input type="text" name="kode" class="form-control" value="<?echo $a_edit['kode'];?>"></td>
											</tr>
											<tr style="height:3px;"></tr>
											<tr>
												<td>DIAGNOSA</td>
												<td>:</td>
												<td><input type="text" name="diagnosa" class="form-control" value="<?echo $a_edit['diagnosa'];?>"></td>
											</tr>
											<tr>
												<td><input type="submit" name="simpan" value="simpan" class="btn btn-outline btn-success" style="float:right;margin:0 0 0 0px;"></td>
											</tr>
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