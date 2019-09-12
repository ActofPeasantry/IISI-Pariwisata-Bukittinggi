<?php
require 'connect.php';

$status = $_GET["status"];
$id = $_GET["id"];
/*
1 industri
2 mesjid
3 rm
4 tw
*/
 
if ($status == 1) {
	$querysearch = " SELECT object_point.id_package, package.name, package.price, package.id_travel FROM object_point left join package on package.id = object_point.id_package where id_souvenir = '$id' ";
} else if ($status == 2) {
	$querysearch = " SELECT object_point.id_package, package.name, package.price, package.id_travel FROM object_point left join package on package.id = object_point.id_package where id_workship_place = '$id' ";
} else if ($status == 3) {
	$querysearch = " SELECT object_point.id_package, package.name, package.price, package.id_travel FROM object_point left join package on package.id = object_point.id_package where id_restaurant = '$id' ";
} else if ($status == 4) {
	$querysearch = " SELECT object_point.id_package, package.name, package.price, package.id_travel FROM object_point left join package on package.id = object_point.id_package where id_tourism = '$id' ";
}


$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id_package'];
		  $id_travel=$row['id_travel'];
		  $name=$row['name'];
		  $price=$row['price'];
		  $dataarray[]=array('id'=>$id,'id_travel'=>$id_travel,'name'=>$name,'price'=>$price);  
	}
echo json_encode ($dataarray);
?>

