<?
	session_start();
	if($_SESSION['jabatan'] !="skincare")
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

<body>
	
    <div id="wrapper"  style="background:white;">

        <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background:white;">
			<div class="navbar-header">
				<h3 style="margin:10px 0 0 20px;font-variant:small-caps;font-weight:bold;color:red;"><strong> Dashboard Skincare</h3></strong>
			</div>
			<div style="float:right;margin:15px 30px 0 0;">
				<a href="logout.php" class="fa fa-power-off" class="btn btn-outline btn-default" style="font-size:20px;" onclick="javascript:var t = confirm ('Yakin ingin keluar?'); if(t==true)return true; else return false"> Keluar
				</a>
			</div>
			<div class="navbar-default sidebar" style="width:200px;font-family:'italic';;">
				<div class="sidebar-nav navbar-collapse" style="width:200px;">
					<ul class="nav" id="side-menu">
						<li>
							<a href="skinCare.php" style="font-size:15px;"><img src="img/dokter.png" height="35px" width="35px"><b> Skin Care</a></b>
						</li>
						
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>						<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="border-left:solid 1px white;background:#ccc;margin:0 0 0 200px;">			
			<div style="margin:0 0 0 10px;">
				<div class="row" style="margin:5px 0 0 -45px;width:1500px;height:250px;">
					<div class="col-lg-7" style="margin:10px 0 0 -0px;width:545px;">
						<div class="panel panel-info">
							<div class="panel-heading">
								Riwayat Pasien
							</div>
							<div class="panel-body" style="width:100%;height:300px;overflow:auto;x;overflow:scroll;">
								<table style="font-size:11px;">
									<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
										<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
										<td style="width:100px;border-right:solid 1px #ccc;">Nama</td>
										<td style="width:350px;border-right:solid 1px #ccc;">Alamat</td>
										<td style="width:100px;border-right:solid 1px #ccc;color;">Jenis Kelamin</td>
										<td style="width:100px;border-right:solid 1px #ccc;color;">Tanggal Lahir</td>
										<td style="width:175px;border-right:solid 1px #ccc;color;">Action</td>
									</tr>
									<?
										$no=1;
										$kill= mysql_query("select * from antrian where s_priksa='0' order by no_antrian asc");
										while($a_kill =mysql_fetch_array($kill))
										{
											$pasien = mysql_query("select * from m_pasien where id='$a_kill[id_pasien]'");
											$a_pasien = mysql_fetch_array($pasien);
											?>
												<tr style="height:30px;border-bottom:solid 1px #ccc;">
													<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
													<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_pasien['nama'];?></td>
													<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_pasien['alamat'];?></td>
													<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_pasien['jk'];?></td>
													<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_pasien['tgl_lahir'];?></td>
													<td style="border-right:solid 1px #ccc;">
														<?
															if($a_kill ['s_priksa'] == '0')
															{
																?>
																	<button class="btn btn-success" style="margin:0px 0 0 20px;" onclick="window.location='skinCare.php?id=<?echo $a_kill['id'];?>'">periksa</button>
																<?
															}
															else
															{
																echo mysql_error();
															}
														?>															
													</td>
												</tr>			
											<?	
										}
									?>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-5" style="margin:0 0 10px 0px;width:40%;">
						<div class="well well-sm" style="margin:10px 0 0 -25px;">
							<h1 style="text-align:center;font-family:'italic';color:red;">List Pasien Skincare</h1>
							<div class="panel-body" style="height:250px;overflow:auto;x:">
							<?
								if(isset($_GET['id']))
								{
									?>
										<?
											$klinik = mysql_query("select * from antrian where id='$_GET[id]'");
											$a_klinik = mysql_fetch_array($klinik);
											
											$care = mysql_query("select * from m_pasien where id='$a_klinik[id_pasien]'");
											$a_care = mysql_fetch_array($care);
										?>
										<form method="POST" action="simpanSkin_care.php">
											<table style="font-size:11px;font-variant:small-caps;font-weight:bold;width:50%;">
												<input type="hidden" name="idAntri" value="<?echo $a_klinik['id'];?>">
												<input type="hidden" name="idPasien" value="<?echo $a_klinik['id_pasien'];?>">
												<tr>
													<td>No RM</td>
													<td>:</td>
													<td><input type="text" name="a" class="form-control" value="<?echo $a_care['no_rm'];?>" readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Nama</td>
													<td>:</td>
													<td><input type="text" name="b" class="form-control" value="<?echo $a_care['nama'];?>"readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													<td><input type="text" name="c" class="form-control" value="<?echo $a_care['alamat'];?>"readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<?php
														$naruto = explode("-",$a_care['tgl_lahir']);
														$lahir = mktime(0, 0, 0, $naruto[2], $naruto[1], $naruto[0]); //jam,menit,detik,bulan,tanggal,tahun
														$t = time();
														$umur = ($lahir < 0) ? ( $t + ($lahir * -1) ) : $t - $lahir;
														$tahun = 60 * 60 * 24 * 365;
														$tahunlahir = $umur / $tahun;
														$umursekarang=floor($tahunlahir) ;
													?>
													
													<td>Umur</td>
													<td>:</td>
													<td><input type="text" name="umur" class="form-control" value="<?echo $umursekarang;?>" readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Tanggal Lahir</td>
													<td>:</td>
													<td><input type="text" name="e" class="form-control" value="<?echo $a_care['tgl_lahir'];?>" readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<?
														date_default_timezone_set('Asia/Jakarta');
													?>
													<td>Tanggal Periksa</td>
													<td>:</td>
													<td><input type="text" name="tglPeriksa" class="form-control" value="<?echo date ("Y-m-d")?>" readonly></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Jam Periksa</td>
													<td>:</td>
													<td><input type="text" name="g" class="form-control" value="<?echo date ("H:i:s")?>" readonly></td>
												</tr>
											</table>
											<table style="margin:-270px 150px 0 280px;font-size:11px;font-weight:bold;font-variant:small-caps;width:40px;">
												<tr style="height:5px;"></tr>
												<tr>
													<td>Anamnesa</td>
													<td>:</td>
													<td><input type="text" name="j" class="form-control"></td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Trantment</td>
													<td>:</td>
													<td>
														<input type="text" name="k" class="form-control">
													</td>
												</tr>
												<tr style="height:5px;"></tr>
												<tr>
													<td>Ket. Tambahhan</td>
													<td>:</td>
													<td><textarea type="text" name="m"></textarea></td>
												</tr>
												<tr>
													<td>
													<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
													</td>
												</tr>
											</table>
										</for
										</div>
									<?
								}
								else
								{
									?>
										<img src="img/listKlinik.png" width="200px" height="200px" style="margin:-20px 0 0px 150px;">
									<?
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-9" style="margin:-0px 0px 0 -543px;width:1145px;">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Danger Panel
                        </div>
                        <div class="panel-body" style="height:150px;overflow:auto;x:">
                            <?
								if(isset($_GET['id']))
								{
									?>
										<table style="font-size:11px;">
											<tr style="height:40px;border-bottom:solid 1px 		#ccc;background:#00FFFF;text-align:Center;font-weight:bold;border-top:solid 1px #ccc;">
												<td style="width:50px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;">No</td>
												<td style="width:100px;border-right:solid 1px #ccc;">Nama</td>
												<td style="width:350px;border-right:solid 1px #ccc;">Alamat</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Jenis Kelamin</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Tanggal Lahir</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Umur</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Tanggal Periksa</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Anamnesa</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Treatment</td>
												<td style="width:100px;border-right:solid 1px #ccc;color;">Keterangan</td>
											</tr>
											<?
												$abc= mysql_query("select * from antrian where id='$_GET[id]'");
												$a_abc =mysql_fetch_array($abc);
											
											
												$nama = mysql_query("select * from m_pasien where id='$a_abc[id_pasien]'");
												$a_nama = mysql_fetch_array($nama);
												
												$no=1;
												$terapi= mysql_query("select * from tbl_skincare where id_pasien='$a_nama[id]'");
												while($a_terapi= mysql_fetch_array($terapi))
												{
													?>
														<tr style="height:30px;border-bottom:solid 1px #ccc;">
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $no++;?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_nama['nama'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_nama['alamat'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_nama['jk'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_nama['tgl_lahir'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_terapi['umur'];?>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_terapi['tgl_periksa'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_terapi['anamnesa'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_terapi['treatment'];?></td>
															<td style="text-align:Center;font-size:11px;border-left:solid 1px #ccc;border-right:solid 1px #ccc;"><?echo $a_terapi['keterangan'];?></td>
														</tr>			
													<?	
												}
											?>
										</table>
									<?
								}
							?>
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