<?php
require 'connect.php';

$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(workship_place.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT workship_place.name, ST_X(ST_Centroid(workship_place.geom)) AS lon, ST_Y(ST_CENTROID(workship_place.geom)) As lat) As l )) As properties 
				FROM workship_place As workship_place  
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>