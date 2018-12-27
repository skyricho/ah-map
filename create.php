<?php 
include ("dbaccess.php");

if (isset($_POST['submit'])) {
	$request = $fm->createRecord('Marker');
	$request->setField('streetNumber', $_POST['streetNumber']);
	$request->setField('streetName', $_POST['streetName']);
	$request->setField('map', $_POST['map']);
	$request->setField('block', $_POST['block']);
	$request->setField('userName', $_POST['userName']);
	$request->setField('date', date('n/j/Y'));
	$request->setField('action', $_POST['action']);
	$result=$request->commit();

	$request = $request->getRecordID();
	$record = $fm->getRecordByID('AddressChange', $request);
	//echo $request;

	echo $record->getField("streetNumber") . ' ' . $record->getField("streetName") . ' (Map ' . $record->getField("map") . ' Block ' . $record->getField("block") . ') [' . $record->getField("userName") . ']<hr>';
}

echo '<form action="post.php" method="POST">
  Map number:<br>
  <input type="text" name="map" value="">
  <br>
  Label:<br>
  <input type="text" name="label" value="">
  <br>
  Marker type:<br>
  <input type="text" name="type" value="">
  <br>
  lat<br>
  <input type="number" name="lat" value="">
  <br>
  lng:<br>
  <input type="text" name="lng" value="">
  
  <br>
  <br>
  <input type="submit" name="submit" value="Submit">
</form>'; 

?>