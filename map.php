<?php
ini_set('display_errors', 1);
include ("dbaccess.php");

if (isset($_GET['map'])) {
	$request = $fm->newFindCommand('MapFeature');
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


$foo2 = array();
$records = $result->getRecords();
//$last_record = array_pop($records);
foreach($records as $record) {
	// test with http://geojsonlint.com
    $foo2 [] = array(
        "type" => "Feature", 
        "geometry" => array(
            "type" => "Point", 
            "coordinates" => array(
                $record->getField('lon'), 
                $record->getField('lat')
            )
        ),
        "properties" => array(
            "id" => $record->getField('id'),
            "imgFilename" => $record->getField('imgFilename')
        )
    );
}
//echo json_encode($foo2, JSON_NUMERIC_CHECK) . '<br><br>'; // JSON_NUMERIC_CHECK to prevent integers converting to strings
//echo print_r($foo2) . '<br><br>';

if (isset($_GET['map'])) {
    $request = $fm->newFindCommand('AddressList');
    $request->addFindCriterion('Map', $_GET['map']);
    //$request->addFindCriterion('isHome', 'ah');
    $result = $request->execute();

    // Diable trapping for errors 
    /*if (FileMaker::isError($result)) {
    echo "<p>Error: " . $result->getMessage() . "</p>"; exit;
    }*/
}

//echo print_r($foo2);
//echo '<br><br>';

$atHomes = array();
$records = $result->getRecords();
foreach($records as $record) {
    // test with http://geojsonlint.com
    $atHomes [] = array(
        "type" => "Feature", 
        "geometry" => array(
            "type" => "Point", 
            "coordinates" => array(
                $record->getField('lat'), 
                $record->getField('lng')
            )
        ),
        "properties" => array(
            "id" => $record->getField('recID'),
            "imgFilename" => $record->getField('imgFilename')
        )
    );
}

//echo print_r($atHomes);

$foo4 = array_merge($foo2,$atHomes);

//echo '<br><br>';
//echo print_r($foo4);

$foo3 = array(
    "type" => "FeatureCollection",
    "features" => $foo4
);
header("Content-Type: application/json; charset=UTF-8");
echo json_encode($foo3, JSON_NUMERIC_CHECK); // JSON_NUMERIC_CHECK to prevent integers 

?>

