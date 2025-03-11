<?php
session_start();
$con=mysqli_connect("localhost","bestaxbh_datacollectiondoctors","datacollectiondoctors123!@#","bestaxbh_datacollectiondoctors");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$base_url="https://healthcarelive.online/datacollectiondoctors/";
?>
