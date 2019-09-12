<?php
require 'connect.php';

$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(tourism.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT tourism.name, ST_X(ST_Centroid(tourism.geom)) AS lon, ST_Y(ST_CENTROID(tourism.geom)) As lat) As l )) As properties 
				FROM tourism As tourism  
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>