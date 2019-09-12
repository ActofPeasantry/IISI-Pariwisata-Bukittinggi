<?php 
include ('inc/connect.php');

		$sql = "select count(*) from tourism
				";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data = pg_fetch_assoc($query);
			return $data;
		}
 ?>

