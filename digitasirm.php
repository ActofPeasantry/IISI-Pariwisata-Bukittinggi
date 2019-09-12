<?php
require 'connect.php';

$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(restaurant.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT restaurant.name, ST_X(ST_Centroid(restaurant.geom)) AS lon, ST_Y(ST_CENTROID(restaurant.geom)) As lat) As l )) As properties 
				FROM restaurant As restaurant  
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>