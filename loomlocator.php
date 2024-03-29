<?php
require("phppsqlsearch_dbinfo.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a pg server
$connection=pg_connect (localhost, $username, $password);
if (!$connection) {
  die("Not connected : " . pg_error());
}
// Set the active pg database
$db_selected = pg_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . pg_error());
}
// Search the rows in the markers table
$query = sprintf("SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  pg_real_escape_string($center_lat),
  pg_real_escape_string($center_lng),
  pg_real_escape_string($center_lat),
  pg_real_escape_string($radius));
$result = pg_query($query);
$result = pg_query($query);
if (!$result) {
  die("Invalid query: " . pg_error());
}
header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while ($row = @pg_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>