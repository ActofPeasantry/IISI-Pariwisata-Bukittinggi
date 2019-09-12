<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "surya2015";
	$port = "5432";
	$dbname = "wisatasumbar";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>