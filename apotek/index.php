<html>
	<head>
		<title>LOGIN</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.theme">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.css">
		
		<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body style="background:;">
		<div class="col-lg-2" style="background:#00FFFF;height:650px;">kanan
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';">
				<div class="sidebar-nav navbar-collapse" style="width:200px;border:solid 5px #ccc;">
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
			</div>						<!-- /.navbar-static-side -->
		</nav>
		</div>
		<div class="col-lg-5">
			<div class="row">
				<div class="panel panel-info" style="margin:50px 0 0 10px;width:300px;">
					<div class="panel-heading" style="font-family:italic;">
						PEMBELIAN
					</div>
					<div class="panel-body">
						<form method="POST" action="">
							<div class="form-group">
								<tr>
									<td>NAMA OBAT</td>
									<td></td>
									<td><input type="text" class="form-control" style="width:200px;" id="item"></td>
								</tr>
								<tr>
									<?
										date_default_timezone_set('Asia/Jakarta');
									?>
									<td>TANGGAL PEMBELIAN</td>
									<td></td>
									<td><input type="text" name="e" class="form-control" style="width:200px;" value="<?echo date("Y-m-d")?>"></td>
								</tr>
							</div>
							<div><input type="submit" name="simpan" value="Save" style="float-right;margin:0 0 0 85%;" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-1" style="background:yellow;">kiri</div>
		
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery-1.8.3.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<script>
			$(function() {  
			$("#item").autocomplete({
				source: "processor/beliItem.php",
				minLength:1,
			});
		});	
		</script>
	</body>
</html>