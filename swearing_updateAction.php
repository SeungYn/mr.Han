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

    $filterSwearingID = (int) mysqli_real_escape_string($swearingDAO->conn,$swearingID);
    $fetchSwearing = $swearingDAO->getSwearing($filterSwearingID);
    
    if(strcmp($fetchSwearing['userID'],$_SESSION['userID'])!==0){
      echo "<script>alert('어딜감히')</script>";
      echo "<script>location.href='swearing.php'</script>";
    }
    
    
    $filterSwearingTitle = mysqli_real_escape_string($swearingDAO->conn,$_POST['swearingTitle']);
    $filterSwearingContent = mysqli_real_escape_string($swearingDAO->conn,$_POST['swearingContent']);
    $swearingDate = $swearingDAO->getDate();
    
    $result = $swearingDAO->update($filterSwearingID,$filterSwearingTitle,$filterSwearingContent,$swearingDate);
    if($result==1){
      echo "<script>location.href='swearing.php'</script>";
    }
    echo "오류";
    
?>