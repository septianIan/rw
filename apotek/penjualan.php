<!DOCTYPE html>
<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	//memmanggil sesion
	session_start();
	//jika sesion tidak ditemukan akn meminta user untuk login
	if($_SESSION['jabatan']!="apoteker")
		{
			?>
			<script>
			alert("Gagal Login...!!");
			window.location="../pages/login.php"
			</script>
			<?php
		}
	else
		{
			?>
			<html lang="en">

			<head>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">

				<title></title>

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
			<script>
				function pembayaran()
				{
					var total = parseInt(document.forms['pembayaranKasir'].jumBeli.value);
					var dibayar = parseInt(document.forms['pembayaranKasir'].dibayar.value);
					
					var kembalian = dibayar - total;
					document.forms['pembayaranKasir'].kembalian.value = kembalian;
					
					if(kembalian < 0)
						document.forms['pembayaranKasir'].simpan.style.display = "none";
					else
						document.forms['pembayaranKasir'].simpan.style.display = "block";
				}
			</script>
			</head>

			<body style="overflow-y:hidden;">

				<div id="wrapper">

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
						<div class="row">	
							<div class="col-lg-6" style="margin:10px 0 0 0px">
								<div class="panel panel-info">
									<div class="panel-heading" style="font-size:12px;">
										<b>Daftar Stok Obat</b>
									</div>
									<div class="panel-body" style="height:300px;overflow-y:auto;">
										<table width="100%"  class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:11px;">
											<thead>
												<tr colspan="3" style="background:#efefef;font-weight:bold;text-align:center;">
													<td>No</td>
													<td>Nama<br>Obat</td>
													<td>No.Batch</td>
													<td>Stok</td>
													<td>Harga<br>Jual</td>
													<td>Tambahkan</td>
												</tr>
											</thead>
											<tbody>
												<?
												$no=1;
												$siswa= mysql_query("select * from barang_masuk order by id asc");
												while($a_siswa=mysql_fetch_array($siswa))
													{
														?>
															<tr>
																<td style="text-align:center;font-size:11px;text-align:center;"><? echo $no++;?></td>
																<td style="text-align:center;font-size:11px;text-align:left;font-weight:bold;"><? echo $a_siswa['nama_obat'];?></td>
																<td style="text-align:center;font-size:11px;text-align:center;"><? echo $a_siswa['no_batch'];?></td>	
																<td style="text-align:center;font-size:11px;text-align:Center;"><? echo $a_siswa['stok_akhir'];?></td>
																<td style="text-align:center;font-size:11px;text-align:Right"><? echo number_format($a_siswa['harga_jual'],'0',',','.');?></td>
																<td style="text-align:center;font-size:11px;text-align:Center;">
																	<?
																		if(isset($_GET['noFaktur']))
																		{
																			?>
																				<button class="btn btn-danger" style="font-size:10px;font-weight:bold;margin:0 2px 0 1px;" onclick="window.location='penjualan.php?noFaktur=<?php echo $_GET['noFaktur']?>&idObat=<?echo $a_siswa['id']?>'">Tambahkan</button>
																			<?
																		}
																		
																		else
																		{
																			?>
																				<i>Ambil no.faktur...</i>
																			<?
																		}
																	?>
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
							
							<div class="col-lg-6" style="margin:10px 0 0 0;">
								<div class="panel panel-danger">
									<div class="panel-heading" style="font-size:12px;">
										<b>Keranjang Pembelian</b>
									</div>
									<div class="panel-body" style="height:300px;overflow-y:auto;">
										<table width="100%"  class="table table-striped table-bordered table-hover" style="font-size:11px;">
											<thead>
												<tr style="background:#efefef;font-weight:bold;text-align:Center;">
													<td>No</td>
													<td>Nama Obat</td>
													<td>Harga Satuan</td>
													<td>Jumlah</td>
													<td>Harga Total</td>
													<td>Batalkan</td>
												</tr>
											</thead>
											<tbody>
												<?
													$no=1;
													$item=mysql_query("select * from penjualan where no_faktur='$_GET[noFaktur]'");
													while($a_item= mysql_fetch_array($item))
													{
														?>
															<tr>
																<td style="text-align:center;"><?echo $no;?></td>
																<td><?echo $a_item['nama_item']?></td>
																<td style="text-align:right;"><?echo number_format($a_item['harga'],'0',',','.')?></td>
																<td style="text-align:center;"><?echo $a_item['jumlah']?></td>
																<td style="text-align:right;"><?echo number_format($a_item['total'],'0',',','.')?></td>
																<td style="text-align:center;font-weight:bold;">
																	<a href="hapus_penjualan.php?id=<?php echo $a_item['id'];?>&noFaktur=<?echo $_GET['noFaktur']?>" onclick="javascript:var y=confirm('Yakin ingin membatalkan');if(y==true) return true;else return false "> <span class="glyphicon glyphicon-trash"></span> </a>
																</td>
															</tr>
														<?
														$no = $no + 1;
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<!--Row2-->
						<div class="row">
							<div class="col-lg-6">
								<div class="panel panel-warning">
									<div class="panel-heading" style="font-size:12px;">
										<b>Jumlah Pembelian Obat</b>
									</div>
									<div class="panel-body" style="height:180px;overflow-y:auto;">
										<?
											if (isset($_GET['noFaktur']))
											{
												?>
													<?
														$pasien=mysql_query("select * from barang_masuk where id='$_GET[idObat]'");
														$a_pasien=mysql_fetch_array($pasien);
													?>
													<form method="POST" action="simpan_penjualan.php">
														<table style="font-size:12px;float:left;">
															<td><input type="hidden" name="id" class="form-control" value="<?echo $a_pasien['id'];?>"></td>
															<tr>
																<td style="font-weight:bold;">Nama faktur</td>
																<td style="font-weight:bold;">:</td>
																<td><input type="text" name="noFaktur" class="form-control" value="<?echo $_GET['noFaktur'];?>" readonly></td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="font-weight:bold;">Nama obat</td>
																<td style="font-weight:bold;">:</td>
																<td><input type="text" name="namaObat" class="form-control" value="<?echo $a_pasien['nama_obat'];?>" readonly></td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="font-weight:bold;">Harga</td>
																<td style="font-weight:bold;">:</td>
																<td><input type="text" name="harga" class="form-control" value="<?echo $a_pasien['harga_jual'];?>" readonly></td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="font-weight:bold;">Jumlah</td>
																<td style="font-weight:bold;">:</td>
																<td><input type="text" name="jumlah" class="form-control" value=""></td>
															</tr>
														</table>
														<table style="font-size:12px;float:left;margin:0 0 0 30px;">
															<tr>
																<?
																	date_default_timezone_set('Asia/Jakarta');
																?>
																<td  style="font-weight:bold;">Tgl beli</td>
																<td  style="font-weight:bold;">:</td>
																<td><input type="text" name="tgl" class="form-control" value="<?echo date("Y-m-d H:i:s")?>" readonly></td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td colspan="3">															
																	<input type="submit" class="btn btn-success" value="Simpan" style="font-weight:bold;font-size:11px;float:right;">
																	<input type="hidden" name="url" value="<?echo $_SERVER['REQUEST_URI']?>">
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
							
							<div class="col-lg-6">
								<div class="panel panel-warning">
									<div class="panel-heading" style="font-size:12px;">
										<b>No.Faktur dan Pembayaran</b>
									</div>
									<div class="panel-body" style="height:180px;overflow-y:auto;">
										<table style="font-size:11px;">										
											<?
												if(isset($_GET['noFaktur']))
												{
													?>
														<form name="pembayaranKasir" method="POST" action="simpan_faktur.php?process=bayarFaktur">
															<tr>
																<td style="width:100px;font-weight:bold;">No.Faktur</td>
																<td style="width:10px;font-weight:bold;text-align:center;">:</td>
																<td style="width:500px;">
																	<?
																		echo $_GET['noFaktur'];
																	?>
																	<input type="hidden" name="noFaktur" value="<?echo $_GET['noFaktur']?>">
																	<input type="hidden" name="url" value="<?echo $_SERVER['REQUEST_URI']?>">
																</td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="width:100px;font-weight:bold;color:Red;font-style:italic;">Total Pembelian</td>
																<td style="width:10px;font-weight:bold;text-align:center;">:</td>
																<td style="width:500px;">
																	<?
																		$jumBeli = mysql_query("select sum(total) as total from penjualan where no_faktur='$_GET[noFaktur]'");
																		$a_jumBeli = mysql_fetch_array($jumBeli);
																	?>
																	<input type="text" name="jumBeli" class="form-control" autocomplete="off" value="<?echo $a_jumBeli['total']?>" style="font-weight:bold;color:Red;">
																</td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="width:100px;font-weight:bold;color:Blue;font-style:italic;">Dibayar</td>
																<td style="width:10px;font-weight:bold;text-align:center;">:</td>
																<td style="width:500px;">
																	<input type="text" name="dibayar" class="form-control" autocomplete="off" value="0" style="font-weight:bold;color:Red;" onKeyUp="pembayaran()">
																</td>
															</tr>
															<tr style="height:3px;"></tr>
															<tr>
																<td style="width:100px;font-weight:bold;color:Blue;font-style:italic;">Kembalian</td>
																<td style="width:10px;font-weight:bold;text-align:center;">:</td>
																<td style="width:500px;">
																	<input type="text" name="kembalian" class="form-control" autocomplete="off" value="0" style="font-weight:bold;color:Red;">
																</td>
															</tr>
															<tr>
																<td colspan="3">
																	<input type="submit" class="btn btn-info" name="simpan" value="Bayar" style="font-size:12px;font-weight:bold;float:Right;margin:3px 0 0 0;display:none;">
																</td>
															</tr>
														</form>
													<?
												}
												
												else
												{
													?>
														<tr>
															<td style="width:100px;font-weight:bold;">No.Faktur</td>
															<td style="width:10px;font-weight:bold;text-align:center;">:</td>
															<td style="width:500px;">
																<form method="POST" action="simpan_faktur.php?process=ambilNoFaktur">
																	<?
																		$sel = mysql_query("select max(no_faktur) as noFaktur from faktur_jual");
																		$a_sel = mysql_fetch_array($sel);
																		if(empty($a_sel['noFaktur']))
																			$nota = 1;
																		else
																			$nota = $a_sel['noFaktur'] + 1;
																	?>
																	<input type="text" name="noFaktur" class="form-control" autocomplete="off" style="width:40%;float:left;" value="<?echo $nota?>">
																	<input type="submit" class="btn btn-success" value="Pakai No.Faktur" style="font-weight:bold;font-size:11px;margin:2px 0 0 5px;">
																</form>
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
					<!-- /#page-wrapper -->
				<!-- /#wrapper -->

				<!-- jQuery -->
				 <script src="../vendor/jquery/jquery.min.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

				<!-- Metis Menu Plugin JavaScript -->
				<script src="../vendor/metisMenu/metisMenu.min.js"></script>

				<!-- DataTables JavaScript -->
				<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
				<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
				<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

				<!-- Custom Theme JavaScript -->
				<script src="../dist/js/sb-admin-2.js"></script>

				<!-- Page-Level Demo Scripts - Tables - Use for reference -->
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