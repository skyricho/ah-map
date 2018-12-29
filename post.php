<?php 
include ("dbaccess.php");

if (isset($_POST['submit'])) {
	$request = $fm->createRecord('MapFeature');
	$request->setField('mapNumber', $_POST['mapNumber']);
	$request->setField('label', $_POST['label']);
  $request->setField('lat', $_POST['lat']);
	$request->setField('lon', $_POST['lon']);
	$request->setField('date', date('n/j/Y'));
	$result=$request->commit();

	$request = $request->getRecordID();
	$record = $fm->getRecordByID('MapFeature', $request);
	//echo $request;

	echo 'Map ' . $record->getField('mapNumber') . ' ID: ' . $record->getField('id') . ' ' . $record->getField('date') . ' ' . $record->getField('lat') . ' ' . $record->getField('lon') . ' ' . $record->getField('label') . '<hr>';

}

echo '<form action="post.php" method="POST">
  Map number:<br>
  <input type="number" name="mapNumber" value="">
  <br>
  Label:<br>
  <input type="text" name="label" value="">
  <br>
  lat<br>
  <input type="text" name="lat" value="">
  <br>
  lon:<br>
  <input type="text" name="lon" value="">
  <br>
  <br>
  <input type="submit" name="submit" value="Submit">
</form>'; 

?>