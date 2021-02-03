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

  $filterSwearingID = mysqli_real_escape_string($swearingDAO->conn,$swearingID);
  $fetchSwearing = $swearingDAO->getSwearing($filterSwearingID);
  
  if(strcmp($fetchSwearing['userID'],$_SESSION['userID'])!==0){
    echo "<script>alert('어딜감히')</script>";
    echo "<script>location.href='swearing.php'</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/swearing.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <section id="swearing">
    <div class="swearingUpdate__background">
      <form action="swearing_UpdateAction.php?swearingID=<?=$fetchSwearing['swearingID']?>" method="post">
        <div class="swearingUpdate__header">
          <input type="text" name="swearingTitle" maxlength="50" value="<?=$fetchSwearing['swearingTitle']?>"> 
        </div>
        <div class="swearingUpdate__content" >
          <textarea class="textareaa1" name="swearingContent" maxlength="4096"><?=$fetchSwearing['swearingContent']?></textarea>
        </div>
        <input type="submit" class="miniButton__submit" value="확인"> 
      <a href="swearing.php" class="miniButton">목록</a>
      <a onClick="return confirm('삭제하시겠습니까?')" href="swearingDelete.php" class="miniButton">삭제</a>
      </form> 
    </div>
  </section>
</body>
</html>