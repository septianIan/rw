<?
	error_reporting(E_ALL ^ E_DEPRECATED ^E_NOTICE);
session_start();
if($_SESSION['jabatan']!="administator")
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
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Administrator</h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="../pages/login.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="width:220px;margin:0 0 0 15px;">
                        <li>
                            <a href="control.php" style="font-size:20px;" class="btn btn-outline btn-default"><i class="fa fa-dashboard fa-fw"></i> Daftar akun</a>
                        </li>
						<tr style="margin:5px 0 0 0;"></tr>
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
						<h4 class="modal-title">Tambah User</h4>
					</div>
					<form method="POST" action="Screate.php">
						<table style="font-size:12px;"><b>
							<tr>
								<td style="font-weight:bold;">NIK</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="a" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">NAMA</td>
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
								<td  style="font-weight:bold;">TANGGAL LAHIR</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="d" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">JENIS KELAMIN</td>
								<td  style="font-weight:bold;">:</td>
								<td><select name="jk" class="form-control">
									<option></option>
									<option>Laki-laki</option>
									<option>Perempuan</option>
								</select></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">USERNAME</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="f" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">PASSWORD</td>
								<td  style="font-weight:bold;">:</td>
								<td><input type="text" name="g" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td  style="font-weight:bold;">JABATAN</td>
								<td  style="font-weight:bold;">:</td>
								<td><select name="h" class="form-control">
									<option></option>
									<option>admin</option>
									<select>dokter</select>
									<option>apoteker</option>
									<option>administator</option>
									<option>skincare</option>
								</select></td>
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="width:1115px;margin:0 0 0 -30px;"><br>
                       <div class="panel panel-success">
							<div class="panel-heading" style="height:60px;">
								<div class="panel-heading" style="font-variant:small-caps;">
									<button type="button" style="margin:-0px 0 0 580px;float:right;" data-toggle="modal" data-target="#myModal1">+ Add user</button>
								<h4>List User</h4>
								</div>
							</div>
							<div class="panel-body">
								<table style="width:1050px;">
									<tr style="height:20px;border-bottom:solid 1px 		#ccc;background:white;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
										<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">NO</td>
										<td style="width:200px;border-right:solid 1px #ccc;">NIK</td>
										<td style="width:200px;border-right:solid 1px #ccc;">NAMA</td>
										<td style="width:200px;border-right:solid 1px #ccc;">ALAMAT</td>
										<td style="width:200px;border-right:solid 1px #ccc;">TENGGAL LAHIR</td>
										<td style="width:200px;border-right:solid 1px #ccc;">JENIS KEAMIN</td>
										<td style="width:200px;border-right:solid 1px #ccc;color:;">USERNAME</td>
										<td style="width:100px;border-right:solid 1px #ccc;color:;">PASSWORD</td>
										<td style="width:100px;border-right:solid 1px #ccc;color:;">JABATAN</td>
										<td style="width:100px;border-right:solid 1px #ccc;color:;">HAPUS</td>
									</tr>
									<?
										$no=1;
										$kill= mysql_query("select * from user order by id desc");
										while ($a_kill =mysql_fetch_array($kill))
										{
											?>
												<tr style="height:30px;border-bottom:solid 1px #ccc;">
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['nik'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['nama'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['alamat'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['tgl_lahir'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['jk'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['username'];?></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><input type="password" name="password" class="form-control" value="<?echo $a_kill['password'];?>"></td>
													<td style="text-align:Center;font-size:12px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_kill['jabatan'];?></td>
													<td style="border-right:solid 1px #ccc;">
														<a href="hapususer.php?id=<?php echo $a_kill['id'];?>" onclick="javascript:var 		y=confirm('Yakin ingin menghapus data?');if(y==true) return true;else return false">
															<button type="button" class="btn btn-outline btn-danger" style="margin:0 0 0 10px;">HAPUS</button>
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
                    <!-- /.col-lg-12 -->
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