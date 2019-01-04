<?php 
include ("dbaccess.php");


$request = $fm->createRecord('MapFeature');
$request->setField('mapNumber', $_GET['mapNumber']);
$request->setField('label', $_GET['label']);
$request->setField('lat', $_GET['lat']);
$request->setField('lon', $_GET['lng']);
$request->setField('date', date('n/j/Y'));
$result=$request->commit();

if (!$result) {
  die('Error: ' .$result->getMessage());
}

?>
