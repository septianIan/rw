<?php
	mysql_connect("localhost","root","clusterstorm");
	mysql_select_db("rw");

	$term = trim(strip_tags($_GET['term']));
 
	$result = mysql_query("select distinct(nama_obat) as namaObat from barang_masuk where nama_obat like '$term%'");
 
	while ($row = mysql_fetch_array($result))
	{
		$row['value'] = htmlentities(stripslashes($row['namaObat']));
		$row_set[] = $row;
	}

	echo json_encode($row_set);
?>