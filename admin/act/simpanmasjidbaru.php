<?php
include ('../inc/connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
// $id_city = $_POST['city'];
$geom = $_POST['geom'];
// $jenis_gambar=$_FILES['image']['type'];
// 	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
// 		$sourcename=$_FILES["image"]["name"];
// 		$name=$id_masjid.'_'.$sourcename;
// 		$filepath="image/".$name;
// 		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
// 	}
// 	else if ($foto=='null' || $foto=='' || $foto==null)
// 	{
// 		$foto = 'foto.jpg';
// 	}

$text = "insert into workship_place (id, name, address,  geom) values ('$id', '$name', '$address', ST_GeomFromText('$geom'))";
// echo $text;

$sql = pg_query($text);
 if ($sql)
 {
 	echo"<script>
        alert ('Data Added!');
        eval(\"parent.location='../?page=masjid'\");
        </script>";
 }
 else 
 {
 	echo 'error';
 }

?>