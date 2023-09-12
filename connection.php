<?php
$hostName = "localhost";
$userName = "root";
$password = "";
// $userName = "id20725554_mimin";
// $password = "RplImpelKel4!";
$databaseName = "id20382767_autoclub";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>