<?php
include ('../inc/connect.php');

$idbaru = $_POST['idbaru'];
$namabaru = $_POST['name'];
$namalengkapbaru = $_POST['fullname'];
$cpbaru = $_POST['cp'];
$geom = $_POST['geom'];
$addressbaru = $_POST['address'];
$websitebaru = $_POST['website'];
$openbaru = $_POST['open'];
$closebaru = $_POST['close'];
$descriptionbaru = $_POST['description'];
$emailbaru = $_POST['email'];
$travel_id = $_POST['travel_id'];
$password = md5(md5($_POST['password']));
$role = $_POST['role'];

echo "id = $idbaru";


$text = "insert into travel (id, name, fullname, cp, geom, address, website, open, close, description, email) values ('$idbaru', '$namabaru', '$namalengkapbaru', '$cpbaru', ST_GeomFromText('$geom'), '$addressbaru','$websitebaru','$openbaru','$closebaru','$descriptionbaru','$emailbaru');
 insert into administrator (travel_id, username,  cp, email,password, role) values ('$idbaru', '$namabaru','$cpbaru', '$emailbaru', '$password',  '".b."')";
// echo $text;
$sql = pg_query($text);
 if ($sql)
 {
 	echo"<script>
        alert ('Data Added!');
        eval(\"parent.location='../?page=travel'\");
        </script>";
 }
 else 
 {
 	echo 'error';
 }

?>


