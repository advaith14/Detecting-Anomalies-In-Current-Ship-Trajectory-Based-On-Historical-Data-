<?php
$count = 0;
include ('connectdbshore.php');
// Start XML file, create parent node

$dom = new DOMDocument("1.0");

$root = $dom->createElement("Positions");
$childroot = $dom->appendChild($root);

$node1 = $dom->createElement("markers");
$parnode1 = $dom->appendChild($node1);
$childroot1 = $childroot->appendChild($node1);
$node2 = $dom->createElement("normals");
$parnode2 = $dom->appendChild($node2);
$childroot2 = $childroot->appendChild($node2);



// Select all the rows in the markers table
header("Content-type: text/xml");
$query1 = "SELECT * FROM anomaly WHERE 1 ORDER BY lng";
$result1 = mysqli_query($conn, $query1);


while ($row = mysqli_fetch_assoc($result1)){
  // Add to XML document node
  $node1 = $dom->createElement("marker");
  $newnode = $parnode1->appendChild($node1);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);

}

$query2 = "SELECT * FROM noanomaly WHERE 1 ORDER BY lng";
$result2 = mysqli_query($conn, $query2);
//header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = mysqli_fetch_assoc($result2)){
  // Add to XML document node
  $node2 = $dom->createElement("normal");
  $newnode2 = $parnode2->appendChild($node2);
  $newnode2->setAttribute("id",$row['id']);
  $newnode2->setAttribute("lat", $row['lat']);
  $newnode2->setAttribute("lng", $row['lng']);

}


echo $dom->saveXML();

?>
