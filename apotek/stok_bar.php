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
				<div style="margin:-540px 0 0 260px;">
					<div class="row">
						<div class="col-lg-9" style="width:890px;heigth:300px;">
							<div class="panel panel-info"  style="margin:15px 0 50px -265px;">
									<div class="panel-heading" style="font-variant:small-caps;font-weight:bold;">
										<h4 style="text-align:center;">List stok barang</h4>
									</div>
								<div class="panel-body"  style="height:500px;overflow:auto;x">
									<table style="font-variant:small-caps;font-weight:bold;" width="1500" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:250px;border-right:solid 1px #ccc;">NAMA OBAT</td>
												<td style="width:10px;border-right:solid 1px #ccc;">SUPPLIER</td>
												<td style="width:10px;border-right:solid 1px #ccc;">NO BACTH</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">HARGA BELI</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">HARGA JUAL</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">STOK AWAL</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">NOMINAL STOK AWAL</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">PENERIMAAN</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">NOMINAL PENERIMAAN</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;">PENGELUARAN</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;"> NOMINAL PENGELUARAN</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;"> STOK AKHIR</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;"> NOMINAL STOK AKHIR</td>
												<td style="width:100px;border-right:solid 1px #ccc;color:;"> EXPIRED</td>
												
											</tr>
											</thead>
											<tbody>
												<?
													$no=1;
													$item=mysql_query("select * from barang_masuk");
													while($a_item= mysql_fetch_array($item))
													{
														?>
															<tr style="border-bottom:solid 1px #ccc">
																<td style="text-align:center;width:50px;border-center:solid 1px #ccc;border-right:solid 1px #ccc;font-size:11px;;border-left:solid 1px #ccc;"><?echo $no++;?></td>
																<td style="text-align:center;width:10px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nama_obat'];?>
																</td>
																<td style="text-align:center;width:350px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['pabrik'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['no_batch'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['harga_beli'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['harga_jual'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['stok_awal'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nominalstok_awal'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['penerimaan'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nominal_penerimaan'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['pengeluaran'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nominal_pengeluaran'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['stok_akhir'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['nominal_stokakhir'];?></td>
																<td style="text-align:center;width:100px;border-right:solid 1px #ccc;font-size:11px;"><?echo $a_item['expired'];?></td>
																
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