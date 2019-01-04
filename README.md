# ah-map

#### Objectives for dev sprint with webeasystep
1. Publish feature collection in a suitable format for Google Maps data layer i.e XML, JSON or GeoJSON
2. js function to determine collection bounds and populate  ```center: {lat: -28.643387, lng: 153.612224},```
3. Info window with form that posts to post.php: map number, label, lat and lon


#### File reference
##### features.php
Retrieves collection of features for the map data layer. [Example google map](https://www.google.com.au/maps/d/u/0/edit?mid=1ctiAekzON8MIwcAOkgkZzQ1SjJRIZtA5&ll=-33.78296625339272%2C151.271711854415&z=17)
or [this](https://drive.google.com/open?id=1ctiAekzON8MIwcAOkgkZzQ1SjJRIZtA5&usp=sharing). Would htis PHP library help? [GeoJson PHP Library](https://github.com/jmikola/geojson)

Four features:
- Block 1
- Block 1
- Meeting Point
- Block 2

[Test URL](https://qc.r2labs.com/ah-map/feature.php?map=19)

##### post.php
create new feature and assign:
- Map number
- Label
- lat
- lon

[Test URL](https://qc.r2labs.com/ah-map/post.php)

##### data.json
Example Feature collection in GeoJSON. [Test URL](https://qc.r2labs.com/ah-map/data.json). Tested using [GeoJSONLint](http://geojsonlint.com).

##### Filemaker Table: MapFeature
Fields (or columns):
- id
- lat
- lon
- label
- mapNumber

##### map icon source
[Numbered markers](https://mapicons.mapsmarker.com/numbers-letters/numbers/?style=white), Teapot or [teahouse](https://mapicons.mapsmarker.com/markers/restaurants-bars/bars/tea-house/?custom_color=9ea2a3).


#### Road Map
- save user IPs and Geolocation then display on Google Map
- Display AtHome Geolocations as a marker (opaque green dot)
- Allow uer to create geolocoation markers (opaque grey dot)
- Allow user to toggle markers from grey to green
- multi-unit marker with info window to record AtHome status for housing unit.