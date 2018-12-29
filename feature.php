<?php 
include ("dbaccess.php");

//echo 'foo';

if (isset($_GET['map'])) {
	$request = $fm->newFindCommand('MapFeature');
	$request->addFindCriterion('mapNumber', $_GET['map']); 
	$result = $request->execute();

	if (FileMaker::isError($result))
	{
	echo "<p>Error: " . $result->getMessage() . "</p>"; exit;
	}

//} else {
//	$request = $fm->newFindAllCommand('MapFeature');
//	$result = $request->execute();

}
echo 'Map ' . $_GET['map'] . ' Features<br>';
$records = $result->getRecords();
foreach($records as $record) {
    echo $record->getField('id') . ' ' . $record->getField('label') . ' ' . $record->getField('lon') . ' ' . $record->getField('lat') . '<br>';
}


?>
