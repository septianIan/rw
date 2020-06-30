<html>
	<head>
		<title></title>
		<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<input type="text" id="item">
	
	<!-- cari -->
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