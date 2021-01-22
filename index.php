<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'tmddbs3124',
  'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

?>
<!doctype html>
<html>
  <head>
  <body>
    <h1>WEB</h1>
    <ol>
      <li>HTML</li>
      <li>CSS</li>
      <li>JavaScript</li>
      <li>PHP</li>
      <li>MySQL</li>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2>Welcome</h2>