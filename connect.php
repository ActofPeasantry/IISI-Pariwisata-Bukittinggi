<?php

/* $host = "localhost";
 $user = "postgres";
 $pass = "12345";
 $port = "5432";
 $dbname = "pariwisata";
 $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass);
 if($conn){
  echo "Koneksi Berhasil";
 } else {
  echo "Koneksi Gagal";
 }
*/
$host = "localhost";
$user = "postgres";
$pass = "postgres";
$port = "5432";
$dbname = "wisatahalal";
$conn = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $dbname . " user=" . $user . " password=" . $pass) or die("Gagal....");
//echo "$conn";
