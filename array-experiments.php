<?php
ini_set('display_errors', 1);


$foo1 = array(
    "type" => "Feature", 
    "geometry" => array(
        "type" => "Point", 
        "coordinates" => array(
            'lng', 
            'lat'
        )
    ),
    "properties" => array(
        "id" => "foo",
        "type" => "bar",
        "label" => "kaz"
    )
);
echo print_r($foo1) . '<br>';
echo json_encode($foo1) . '<hr><br><br>';


$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.<br>";
echo print_r($age) . '<hr><br><br>';


$ar = array('apple', 'orange', 'banana', 'strawberry');
echo print_r($ar) . '<br>';
echo json_encode($ar) . '<hr><br><br>'; // ["apple","orange","banana","strawberry"]


$book = array(
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);
echo print_r($book) . '<br>';
echo json_encode($book) . '<hr><br><br>';

?>
