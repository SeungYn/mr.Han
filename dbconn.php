<?php
  var_dump($_POST);
  $conn = mysqli_connect("localhost","root","tmddbs3124","test");


  $sql = "INSERT INTO test (num, text) VALUES (?,?)";

  $stmt = mysqli_prepare($conn,$sql);
  settype($_POST['id'],'integer');
  echo $_POST['id'];
  echo settype($_POST['id'],"integer");
  mysqli_stmt_bind_param($stmt,"is",$_POST['id'],$_POST['text']);

  $stmt->execute();


?>