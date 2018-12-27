<?php 
include ("dbaccess.php");

if (isset($_POST['submit'])) {
	$request = $fm->createRecord('Marker');
	$request->setField('mapNumber', $_POST['mapNumber']);
	$request->setField('label', $_POST['label']);
	$request->setField('type', $_POST['type']);
	$request->setField('lat', $_POST['lat']);
	$request->setField('lng', $_POST['lng']);
	$request->setField('date', date('n/j/Y'));
	$result=$request->commit();

	$request = $request->getRecordID();
	$record = $fm->getRecordByID('Marker', $request);
	//echo $request;

	echo 'Map ' . $record->getField('mapNumber') . ' ID: ' . $record->getField('id') . ' ' . $record->getField('date') . ' ' . $record->getField('lat') . ' ' . $record->getField('lng') . ' Type: ' . $record->getField('type') . ' ' . $record->getField('label') . '<hr>';
}

echo '<form action="post.php" method="POST">
  Map number:<br>
  <input type="number" name="mapNumber" value="">
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
  <input type="number" name="lng" value="">
  
  <br>
  <br>
  <input type="submit" name="submit" value="Submit">
</form>'; 

?>