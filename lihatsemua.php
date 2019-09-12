<?php
include 'connect.php';

$querysearch	="SELECT id,fullname FROM travel";
			   
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['fullname'];
      //  $price=$baris['price']; \
        
        $dataarray[]=array('id'=>$id,'name'=>$name);
    }
echo json_encode ($dataarray);
?>
