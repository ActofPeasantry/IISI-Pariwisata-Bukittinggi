<?php
require 'connect.php';

$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(travel.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT travel.name, ST_X(ST_Centroid(travel.geom)) AS lon, ST_Y(ST_CENTROID(travel.geom)) As lat) As l )) As properties 
				FROM travel As travel
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>