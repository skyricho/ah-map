# ah-map


### Foo


#### Objectives for dev sprint with webeasystep
1. Publish feature collection in a suitable format for Google Maps data layer i.e XML, JSON of GeoJSON
2. js function to determin collection bounds and populate  ```center: {lat: -28.643387, lng: 153.612224},```
3. Info window with form that posts to post.php: map number, label, lat and lon


#### Files

##### features.php

Retrieves collection of features for the map data layer

Example google map: <https://www.google.com.au/maps/d/u/0/edit?mid=1ctiAekzON8MIwcAOkgkZzQ1SjJRIZtA5&ll=-33.78296625339272%2C151.271711854415&z=17>
4 features:
- Block 1
- Block 1
- Meeting Point
- Block 2


Test URL: <https://qc.r2labs.com/ah-map/features.php?map=19>

###### post.php
create new feature
Assign feature
Map number
Label
lat
lon
Test URL: [https://qc.r2labs.com/ah-map/post.php]

###### data.json
Example Feature collection in GeoJsSON
Test URL: [https://qc.r2labs.com/ah-map/data.json]
Tested using [http://geojsonlint.com]

Filemaker Table: MapFeature

id
lat
lon
icontype
map

Function to determine feature collction bounds

https://drive.google.com/open?id=1ctiAekzON8MIwcAOkgkZzQ1SjJRIZtA5&usp=sharing


Ny=umbered markers source
https://mapicons.mapsmarker.com/numbers-letters/numbers/?style=white

Teapot or teahouse
https://mapicons.mapsmarker.com/markers/restaurants-bars/bars/tea-house/?custom_color=9ea2a3