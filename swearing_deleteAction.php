<?php 
  require('userID_session.php');
  require('swearingDAO.php');
  $swearingDAO = new SwearingDAO;
  $maxSwearingID = $swearingDAO->getListNum();
  if(!isset($_GET['swearingID'])){
    $swearingID = 1;
  }else if($_GET['swearingID']<=1){
    $swearingID = 1;
  }else if($_GET['swearingID']>=$maxSwearingID){
    $swearingID = $maxSwearingID;
  }else {
    $swearingID = $_GET['swearingID'];
  }

  $filterSwearingID = (int)mysqli_real_escape_string($swearingDAO->conn,$swearingID);
  $fetchSwearing = $swearingDAO->getSwearing($filterSwearingID);
  
  if(strcmp($fetchSwearing['userID'],$_SESSION['userID'])!==0){
    echo "<script>alert('어딜감히')</script>";
    echo "<script>location.href='swearing.php'</script>";
  }
  
  $deleteResult = $swearingDAO->delete($filterSwearingID);
  $cloneResult =$swearingDAO->cloneSwearing();
  $realdelete =$swearingDAO->deleteSwearing();
  $reindexing = $swearingDAO->reindexing();

  if($deleteResult == 1||$cloneResult == 1 || $realdelete == 1){
    echo "<script>location.href='swearing.php'</script>";
  }
  echo "<script>alert('뭔가 문제생김')</script>";
  echo "<script>location.href='swearing.php'</script>";
  
?>