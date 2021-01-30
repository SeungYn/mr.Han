<?php 
  session_start();
  if(!isset($_SESSION['userID'])){
    echo "<script>alert('로그인이 필요합니다.')</script>";
    echo $_SSESION['userID'];
    //echo "<script>history.back()</script>";
  }
?>