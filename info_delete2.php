<?php
include ('connect.php');
$id_info = $_GET['id_info'];
$id_travel = $_POST['id_travel'];
//echo "$id_info --> id_info";

	$sql1   = "delete from info where id_info = $id_info";
	$delete1 = pg_query($sql1);
	if ($delete1){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}
	
	echo "<script>eval(\"document.location='detailtravel.php'\");</script>";
?>