<?
	error_reporting(E_ALL ^ E_DEPRECATED);
	if(isset($_GET['id_pasien']))
	{
		?>
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
						<div class="col-lg-1">1</div>
						<div class="col-lg-10">
							<div class="jumbotron" style="margin:15px 0 0 0;">
								<h2 style="text-align:center;font-family:'italic';margin:20px 0 0 0;">ian</h2>
								<?php
									$periksa= mysql_query("select * from m_periksa where id='$_GET[id_pasien]'");
									$a_periksa= mysql_fetch_array($periksa);
								?>
								<tr>
									<input type="text" name="id" value="<?php echo $a_periksa['id_pasien
									'];?>" class="form-control"></td>
								</tr>
							</div>
						</div>
						<div class="col-lg-1">2</div>
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