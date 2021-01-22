<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'tmddbs3124',
  'opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
var_dump($result->num_rows);
?>