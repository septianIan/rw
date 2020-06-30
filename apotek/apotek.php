<?
error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="apoteker")
{
	?>
		<script>
			alert("Gagal Login...!!");
			window.location="../pages/login.php"
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <div class="navbar-header">
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong>Apoteker</h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="../pages/logout.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
            <div class="navbar-default sidebar" style="width:200px;font-family:'italic';">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
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
				</div>
				<!-- /.sidebar-collapse -->
			</div>
            <!-- /.navbar-static-side -->
        </nav>
		<div class="modal fade" id="myModal1" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div align=center class="modal-content" style="width:340px;">
					<div class="modal-header">
						<button type="button" class="btn btn-outline btn-default" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Item</h4>
					</div>
					<form method="POST" action="simpan_item.php">
						<table style="font-size:12px;"><b>
							<tr>
								<td style="font-weight:bold;">Nama item</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="a" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">Jenis barang</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="b" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">SATUAN</td>
								<td  style="font-weight:bold;">:</td>
								<td>
									<input type="text" name="c" class="form-control">
								</td>
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
		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div align=center class="modal-content" style="width:340px;">
					<div class="modal-header">
						<button type="button" class="btn btn-outline btn-default" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Supplier</h4>
					</div>
					<form method="POST" action="simpan_supp.php">
						<table style="font-size:12px;"><b>
							<tr>
								<td style="font-weight:bold;">NAMA SUPPLIER</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="a" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">PERUSAHAAN</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="b" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">ALAMAT</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="c" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">NO TELPON</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="d" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">EMAIL</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="e" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
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
        <!-- Page Content -->
        <div id="page-wrapper" style="margin:0 0 0 200px;background:#ccc;height:600px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6"><br>
                       <div class="panel panel-success">
							<div class="panel-heading" style="height:60px;">
								<div class="panel-heading" style="font-variant:small-caps;">
								Master Item
									<button type="button" class="btn btn-outline btn-default" style="margin:-30px 0 0 580px;float:right;" data-toggle="modal" data-target="#myModal1">+</button>
								</div>
							</div>
							<div class="panel-body" style="height:210px;overflow:auto;x:;width:520px;overflow:scroll;">
								<table style="width:600px;">
									<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
										<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
										<td style="width:300px;border-right:solid 1px #ccc;">NAMA</td>
										<td style="width:80px;border-right:solid 1px #ccc;">JENIS</td>
										<td style="width:100px;border-right:solid 1px #ccc;color:;">SATUAN</td>
										<td style="width:175px;border-right:solid 1px #ccc;color:;">EDIT</td>
										<td style="width:175px;border-right:solid 1px #ccc;color:;">HAPUS</td>
									</tr>
									<?
										$no=1;
										$item=mysql_query("select * from m_item order by nama_item asc");
										while($a_item= mysql_fetch_array($item))
										{
											?>
												<tr style="border-bottom:solid 1px #ccc">
													<td style="text-align:center;width:50px;border-center:solid 1px #ccc;border-right:solid 1px #ccc;font-size:11px;;border-left:solid 1px #ccc;"><?echo $no++;?></td>
													<td style="text-align:center;width:10px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nama_item'];?>
													</td>
													<td style="text-align:center;width:350px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['jenis_bar'];?></td>
													<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['satuan'];?></td>
													<td style="border-right:solid 1px #ccc;">
														<button type="button" class="btn btn-outline btn-primary" style="margin:0 0 0 20px;" onclick="window.location='apotek.php?edit2=<?echo $a_item['id'];?>'">Edit</button>
													</td>
													<td style="border-right:solid 1px #ccc;">
														<a href="hapus_item.php?id=<?php echo $a_item['id'];?>" onclick="javascript:var 	y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false"><button style="margin:0 0 0 15px;color;black;" class="btn btn-outline btn-danger">Hapus</button></a>
													</td>
												</tr>
											<?
										}
									?>
								</table>
							</div>
					   </div>
                    </div>
					<div class="col-lg-6"><br>
                       <div class="panel panel-info">
							<div class="panel-heading" style="height:60px;">
								<div class="panel-heading" style="font-variant:small-caps;">
								Master Supplier
									<button type="button" class="btn btn-outline btn-default" style="margin:-30px 0 0 580px;float:right;" data-toggle="modal" data-target="#myModal2">+</button>
								</div>
							</div>
							<div class="panel-body" style="height:210px;overflow:auto;x:;width:520px;overflow:scroll;">
								<table style="width:800px;">
									<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
										<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
										<td style="width:250px;border-right:solid 1px #ccc;">NAMA</td>
										<td style="width:100px;border-right:solid 1px #ccc;">PERUSAHAAN</td>
										<td style="width:350px;border-right:solid 1px #ccc;">ALAMAT</td>
										<td style="width:150px;border-right:solid 1px #ccc;color;">NO.TELP</td>
										<td style="width:175px;border-right:solid 1px #ccc;color;">EMAIL</td>
										<td style="width:175px;border-right:solid 1px #ccc;color;">EDIT</td>
										<td style="width:175px;border-right:solid 1px #ccc;color;">HAPUS</td>
									</tr>
									<?
										$no=1;
										$supp=mysql_query("select * from m_supplier order by nama_supp asc");
										while($a_supp= mysql_fetch_array($supp))
										{
											?>
												<tr style="border-bottom:solid 1px #ccc">
													<td style="text-align:center;width:50px;border-center:solid 1px #ccc;border-right:solid 1px #ccc;font-size:11px;;border-left:solid 1px #ccc;"><?echo $no++;?></td>
													<td style="text-align:center;width:10px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_supp['nama_supp'];?>
													</td>
													<td style="text-align:center;width:350px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_supp['perusahaan'];?></td>
													<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_supp['alamat'];?></td>
													<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_supp['no_telp'];?></td>
													<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_supp['email'];?></td>
													<td style="border-right:solid 1px #ccc;">
														<button type="button" class="btn btn-outline btn-primary" style="margin:0 0 0 20px;" onclick="window.location='apotek.php?edit=<?echo $a_supp['id'];?>'">Edit</button>
													</td>
													<td style="border-right:solid 1px #ccc;">
														<a href="hapus_supp.php?id=<?php echo $a_supp['id'];?>" onclick="javascript:var 	y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false"><button style="margin:0 0 0 15px;color;black;" class="btn btn-outline btn-danger">Hapus</button></a>
													</td>
												</tr>
											<?
										}
									?>
								</table>
							</div>
					   </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					<div class="col-lg-6">
                       <div class="panel panel-success">
							<div class="panel-heading" style="height:60px;">
								<div class="panel-heading" style="font-variant:small-caps;">
								Edit Item
								</div>
							</div>
							<div class="panel-body" style="height:200px;overflow:auto;x">
								<?
									error_reporting(E_ALL ^ E_DEPRECATED);
									if (isset($_GET['edit2']))
									{
										?>
											<form method="POSt" action="edit_item.php">
											<table>
												<?
													$item= mysql_query("select * from m_item where id='$_GET[edit2]'");
													$a_item=mysql_fetch_array($item);
												?>
												<td><input type="hidden" name="id" value="<?php echo $a_item['id'];?>" class="form-control"></td>
												<tr>
													<td>NAMA ITEM</td>
													<td>:</td>
													<td><input type="text" name="nama" class="form-control" value="<?echo $a_item['nama_item'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>JENIS BARANG</td>
													<td>:</td>
													<td><input type="text" name="barang" class="form-control" value="<?echo $a_item['jenis_bar'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>SATUAN</td>
													<td>:</td>
													<td><input type="text" name="satuan" class="form-control" value="<?echo $a_item['satuan'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
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
					<div class="col-lg-6">
                       <div class="panel panel-info">
							<div class="panel-heading" style="height:60px;">
								<div class="panel-heading" style="font-variant:small-caps;">
								Edit Supplier
								</div>
							</div>
							<div class="panel-body" style="height:200px;overflow:auto;x">
								<?
									error_reporting(E_ALL ^ E_DEPRECATED);
									if (isset($_GET['edit']))
									{
										?>
											<form method="POSt" action="edit_supp.php">
											<table>
												<?
													$sup= mysql_query("select * from m_supplier where id='$_GET[edit]'");
													$a_sup=mysql_fetch_array($sup);
												?>
												<td><input type="hidden" name="id" value="<?php echo $a_sup['id'];?>" class="form-control"></td>
												<tr>
													<td>NAMA SUPPLIER</td>
													<td>:</td>
													<td><input type="text" name="nama" class="form-control" value="<?echo $a_sup['nama_supp'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>PERUSAHAAN</td>
													<td>:</td>
													<td><input type="text" name="perusahaan" class="form-control" value="<?echo $a_sup['perusahaan'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>ALAMAT</td>
													<td>:</td>
													<td><input type="text" name="alamat" class="form-control" value="<?echo $a_sup['alamat'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>NO TELPON</td>
													<td>:</td>
													<td><input type="text" name="telp" class="form-control" value="<?echo $a_sup['no_telp'];?>"></td>
												</tr>
												<tr style="height:3px;"></tr>
												<tr>
													<td>EMAIL</td>
													<td>:</td>
													<td><input type="text" name="email" class="form-control" value="<?echo $a_sup['email'];?>"></td>
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

	<?
}
?>