<?php 
include ("dbaccess.php");

if (isset($_GET['map'])) {
	$request = $fm->newFindCommand('Marker');
	$request->addFindCriterion('mapNumber', $_GET['map']); 
	$result = $request->execute();

	if (FileMaker::isError($result))
	{
	echo "<p>Error: " . $result->getMessage() . "</p>"; exit;
	}

} else {
	$request = $fm->newFindAllCommand('Marker');
		$result = $request->execute();
}

echo '
{
	"type": "FeatureCollection",
    "features": [';
$records = $result->getRecords();
$last_record = array_pop($records);
foreach($records as $record) {
	// replace with geojson.php soon. https://gist.github.com/wboykinm/5730504
	// test with http://geojsonlint.com
    echo '
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [' .
                    $record->getField('lng') . ',' . 
				    $record->getField('lat') . '
                ]
            },
            "properties": {
                "id": "' . $record->getField('id') . '",
				"type": "' . $record->getField('type') . '",
				"label": "' . $record->getField('label') . '"
            }
        },';
}

foreach($last_record as $record) {
    echo '
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [' .
                    $record->getField('lng') . ',' . 
				    $record->getField('lat') . '
                ]
            },
            "properties": {
                "id": "' . $record->getField('id') . '",
				"type": "' . $record->getField('type') . '",
				"label": "' . $record->getField('label') . '"
            }
        }';
}

echo '
    ]
}';

//$jsondata = json_encode($jsondata, JSON_PRETTY_PRINT);
//echo $jsondata
?>

<!-- 
<p>Example geojson output<br>
  <code>
{
  "type": "Feature",
  "geometry": {
    "type": "Point",
    "coordinates": [125.6, 10.1]
  },
  "properties": {
    "name": "Dinagat Islands"
  }
}
  </code>
</p>


GeoJSONLint
{
	"type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -80.870885,
                    35.215151
                ]
            },
            "properties": {
                "name": "ABBOTT NEIGHBORHOOD PARK",
                "address": "1300  SPRUCE ST"
            }
        },
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -80.837753,
                    35.249801
                ]
            },
            "properties": {
                "name": "DOUBLE OAKS CENTER",
                "address": "1326 WOODWARD AV"
            }
        },

    ]
}


{
			"type": "Feature",
			"geometry": {
				"type": "Point",
				"coordinates": [' . 
				    $record->getField('lng') . ',' . 
				    $record->getField('lat') . '
				    ]
				},
			"properties": {
				"id": "' . $record->getField('id') . '",
				"type": "' . $record->getField('type') . '"
			}
		}
-->
