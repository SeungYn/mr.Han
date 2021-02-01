<?php 
  session_start();
  if(!isset($_SESSION['userID'])){
    echo "<script>alert('로그인이 필요합니다.')</script>";
    echo "<script>location.href='login.php'</script>";
  }
?>