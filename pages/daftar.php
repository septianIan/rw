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

</head>

<body>

    <div class="container">
        <div class="row">
			<div class="col-lg-4">
			<div class="panel panel-info" style="margin:100px 0 0 0;">
				<div class="panel-heading" style="font-family:italic;">
					DAFTAR
				</div>
				<div class="panel-body">
					<form method="POST" action="Spasien.php">
						<table>
							<tr>
								<td>No.RM</td>
								<td>:</td>
								<td><input type="text" name="a" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><input type="text" name="b" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><input type="text" name="c" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td>Tgl.Lahir</td>
								<td>:</td>
								<td><input type="text" placeholder="tahun-bulan-tanggal" name="d" class="form-control"></td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><select name="e" class="form-control">
									<option value=""></option>
									<option value="">laki-Laki</option>
									<option value="">Perempuan</option>
									</select>
								</td>
							</tr>
							<tr style="height:3px;"></tr>
							<tr>
								<td>No.Telpon</td>
								<td>:</td>
								<td><input type="text" name="f" class="form-control"></td>
							</tr>
							<tr style="height:6px;"></tr>
							<tr>
								<td></td>
								<td></td>
								 <td>
								 <input type="submit" name="simpan" value="Simpan" style="float:right;margin:0 0 0 0;"class="btn 	btn-success">
								</td>
							</tr>
						</table>	
					</form>
				</div>
			</div>
		</div>
		</div>   
    </div>

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