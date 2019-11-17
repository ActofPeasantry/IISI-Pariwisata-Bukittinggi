<?php
	$host = "localhost";
	$user = "Peasant";
	$pass = "peasant";
	$port = "5432";
	$dbname = "wisatahalal";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
