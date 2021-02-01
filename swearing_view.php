<?php 
  session_start();
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
    <div class="swearingView__background">
      <div class="swearingView__header">
        <ul class="titleAndwriter">
          <li>제목:<?=htmlspecialchars($fetchSwearing['swearingTitle'])?></li>
          <li>작성자:<?=htmlspecialchars($fetchSwearing['userID'])?></li>
        </ul>
        <div class="line"></div>
        <ul class="listNumAnddate">
          <li>글 번호:<?=htmlspecialchars($fetchSwearing['swearingID'])?></li>
          <li>날짜:<?=htmlspecialchars($fetchSwearing['swearingDate'])?></li>
        </ul>
      </div>
      <div class="swearingView__content">
        <p><?=$fetchSwearing['swearingContent']?></p>
      </div>
      <a href="swearingUpdate.php" class="miniButton">수정</a>
      <a onClick="return confirm('삭제하시겠습니까?')" href="swearingDelete.php" class="miniButton">삭제</a>
    </div>
  </section>
</body>
</html>