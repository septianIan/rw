<?
error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="apoteker")
	{
		?>
			<script>
				alert("Gagal login...!!!");
				window.location="../pages/login.php";
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
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Apoteker</h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="../pages/logout.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
					<ul class="nav" id="side-menu">
						<ul class="nav" id="side-menu">
						<li>
							<a href="apotek.php" style="font-size:15px;"><img src="img/format.png" height="35px" width="35px"><b>Master</a></b>
						</li>
						<li>
							<a href="pembelian_bar.php" style="font-size:15px;"><img src="img/order.png" height="35px" width="35px"><b> Penerimaan barang</a></b>
						</li>
						<li>
							<a href="stok_bar.php" style="font-size:15px;"><img src="img/stok.png" height="35px" width="35px"><b> Stok Barang</a></b>
						</li>
						<li>
							<a href="penjualan.php" style="font-size:15px;"><img src="img/pembelian.png" height="35px" width="35px"><b> Penjualan</a></b>
						</li>
					</ul>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>						<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">
			<div style="border:solid 5px #ccc;margin:0px 0 0 -20px;height:590px;width:1090px;">
				<div style="margin:-570px 0 0 330px;">
					<div class="row">
						<div class="col-lg-9" style="width:780px;heigth:300px;">
							<div class="panel panel-danger"  style="margin:270px 0 50px 0px;">
									<div class="panel-heading" style="font-variant:small-caps;font-weight:bold;">
										<h4 style="text-align:center;">Penjualan Item</h4>
									</div>
								<div class="panel-body"  style="height:260px;overflow:auto;x">
									<table style="font-variant:small-caps;font-weight:bold;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr style="height:40px;border-bottom:solid 1px #ccc;background:#00FFFF;text-align:Center;font-weight:bold;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:30px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">NO FAKTUR</td>
												<td style="width:300px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">NAMA ITEM</td>
												<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">JUMLAH BELI</td>
												<td style="width:110px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">SATUAN ITEM</td>
												<td style="width:100px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">DISKON</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">TANGGAL BELI</td>
												<td style="width:100px;border-right:solid 1px #ccc;;font-family:'Ubuntu';font-size:12px;">HARAGA</td>
											</tr>
											</thead>
											<tbody>
												<?
													$no=1;
													$periksa= mysql_query("select * from penjualan order by nama_item asc");
													while ($a_periksa= mysql_fetch_array($periksa))
													{												
														?>
															
															<tr style="height:30px;border-bottom:solid 1px #ccc;">
																<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
																<td style="text-align:left;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['no_faktur'];?></td>
																<td style="text-align:left;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['nama_item'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['jumlah'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['satuan'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['diskon'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['tgl_pembelian'];?></td>
																<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;border-bottom:solid 1px #ccc;"><?echo $a_periksa['harga'];?></td>
																<td>
																<button onclick="window.location='penjualan.php?no_faktur=<?echo $a_periksa['no_faktur'];?>'">+</button>
																</td>
															</tr>
														<?
													}
												?>
												<td>Total</td>
													
													<td><input type="text" class="form-control"></td>
													
											</tbody>
										</table>	
									</table>
								</div>
							</div>
						</div>
						<div class="col-lg-4"  style="margin:-610px 0 0 -295px;width:320px;">
							<div class="panel panel-success">
								<div class="panel-heading" style="font-family:italic;text-align:center;">
									STOK OBAT
								</div>
								<div class="panel-body" style="height:515px;overflow:auto;x">								
									<table style="font-variant:small-caps;font-weight:bold;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr style="height:40px;border-bottom:solid 1px #ccc;background:#00FFFF;text-align:Center;font-weight:bold;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:199px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">OBAT</td>
												<td style="width:1
												px;border-right:solid 1px #ccc;font-family:'Ubuntu';font-size:12px;">ACT</td>
											</tr>
										</thead>
										<tbody>
											<?
												$obat= mysql_query("select * from barang_masuk where id");
												while($a_obat=mysql_fetch_array($obat))
												{
													?>
														<tr>
															<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
															<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;"><?echo $a_obat['nama_obat'];?></td>
															<td style="text-align:Center;font-size:12px;border-right:solid 1px #ccc;">
																<button class="btn btn-outline btn-danger" onclick="window.location='penjualan.php?id=<?echo $a_obat['id'];?>'"><font>+</font></button>
															</td>
														<tr>
													<?
												}
											?>
										</tbody>
									</table>
								</div>		
							</div>
						</div>
						<div class="col-lg-4"  style="margin:-610px 0 0 -0px;width:778px;">
							<div class="panel panel-info">
								<div class="panel-heading" style="font-family:italic;text-align:center;">
									PENJUALAN
								</div>
									<div class="panel-body" style="height:190px;overflow:auto;x">
										<?
											if(isset($_GET['id']))
											{
												?>
												<form method="POST" action="simpan_penjualan.php">
													<?
													date_default_timezone_set('Asia/Jakarta');
													?>
													<table style="margin:0 0 0 15px;float:center;font-weight: bold;">
														<tr style="height:3px;"></tr>
														<?
														$rw= mysql_query("select * from barang_masuk where id='$_GET[id]'");
														$a_rw= mysql_fetch_array($rw);
														?>
														<tr>
															<?
																$maksFaktur = mysql_query("select max(no_faktur) as noFaktur from penjualan");
																$a_maksFaktur = mysql_fetch_array($maksFaktur);
																if(empty($a_maksFaktur['noFaktur']))
																	$nomerFaktur = 1;
																else
																	$nomerFaktur = $a_maksFaktur['noFaktur'] + 1;
															?>
															<td>No Faktur</td>
															<td>:</td>
															<td><input type="text" name="no_faktur" class="form-control" style="width:170px;" value="<?echo $nomerFaktur?>">
															</td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td>Nama Item</td>
															<td>:</td>
															<td><input type="text" name="a" class="form-control" style="width:170px;" value="<?echo $a_rw['nama_obat'];?>">
															</td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td>Harga</td>
															<td>:</td>
															<td><input type="text" name="b" class="form-control" style="width:170px;" value="<?echo $a_rw['harga_jual'];?>">
															</td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td>Satuan</td>
															<td>:</td>
															<td><input type="text" name="c" class="form-control" style="width:170px;" value="<?echo $a_rw['satuan'];?>"></td>
														</tr>
													</table>
													<table style="margin:-150px 0 0 400px;font-weight: bold;">
														<tr>
															<td>Jumlah</td>
															<td>:</td>
															<td><input type="text" name="d" class="form-control" style="width:170px;" value=""></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td>Diskon</td>
															<td>:</td>
															<td><input type="text" name="diskon" class="form-control" style="width:170px;" value=""></td>
														</tr>
														<tr style="height:3px;"></tr>
														<tr>
															<td>Tanggal pembelian</td>
															<td>:</td>
															<td><input type="text" name="e" class="form-control" style="width:170px;" value="<?echo date("Y-m-d")?>"></td>
														</tr>
															<tr style="height:3px;"></tr>
															<td></td>
															<td></td>
															<td>
																<input type="hidden" name="idAntrian" value="<?echo $_GET['id']?>">
																<input type="submit" name="simpan" value="simpan" class="btn btn-outline btn-success" style="float:right;margin:0 0 0 0;">
															</td>
														</tr>
												</form>
												<?
											}
										?>
										<?
											if (isset($_GET['no_faktur']))
											{
												?>
													
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