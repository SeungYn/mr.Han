<?php 
  require_once('swearingDAO.php');
  require_once('swear.php');
  session_start();
  

  $swearingInfo = new Swearing;
  $swearingDAO = new SwearingDAO;
  $swearingInfo->setSwearingTitle(mysqli_real_escape_string($swearingDAO->conn,$_POST['swearingTitle']));
  $swearingInfo->setSwearingContent(mysqli_real_escape_string($swearingDAO->conn,$_POST['swearingContent']));
  $swearingInfo->setUserID(mysqli_real_escape_string($swearingDAO->conn,$_SESSION['userID']));
  $swearingInfo->setSwearingDate(mysqli_real_escape_string($swearingDAO->conn,$swearingDAO->getDate()));

  if(!isset($_SESSION['userID'])){
    echo "<script>alert('로그인이 필요합니다')</script>";
    echo "<script>location.href='login.php'</script>";
  }
  
  

  
  $rs = $swearingDAO->write($swearingInfo->getSwearingTitle(),$swearingInfo->getuserID(),$swearingInfo->getSwearingDate(),$swearingInfo->getSwearingContent());
  if($rs==1){
    echo "<script>alert('공사중')</script>";
  }

?>