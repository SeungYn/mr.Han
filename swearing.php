<?php 
  require_once('userID_session.php');
  require_once('swearingDAO.php');
  $swearingDAO = new swearingDAO;
  if(!isset($_GET['now_page'])){
    $_GET['now_page']=1;
    $now_page = $_GET['now_page'];
  }else {$now_page = $_GET['now_page'];}

  $standard_block= 10;
  $standard_list= 10;
  $list_total_num = $swearingDAO->getListNum();
  $total_page= ceil($list_total_num/$standard_list);
  if($now_page<=1){
    $now_page=1;
  }else if($now_page>=$total_page){
    $now_page=$total_page;
  }
  $now_block = ceil($now_page/$standard_block);
  $first_page= ($now_block*$standard_block) - ($standard_block-1);
  $last_page = $now_block*$standard_block;

  if($last_page>=$total_page){
    $last_page = $total_page;
  }

  //페이징 번호
  $page_list="";
  for($i=$first_page;$i<=$last_page;$i++){
    $page_list.="<a href='swearing.php?now_page={$i}'>{$i}</a>";
  }

  //리스트 가져오기
  $limit = 10;
  if($now_page==1){
    $limit = $list_total_num%$standard_list;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/swearing.css"></link>
  <link rel="stylesheet" href="css/style.css"></link>
  <title>Document</title>
</head>
<body>
  <!-- Swearing board -->
  
  <section id="swearing">
    <table class="swearing_table">
      <thead>
        <tr>
          <th width="10%">번호</th><th >제목</th><th width="20%">작성자</th><th width="20%">작성일</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $take = abs($now_page-$total_page)+1;
            $num = ($take*10);
            $get_list = $swearingDAO->getList($num,$limit);
          while($row = mysqli_fetch_assoc($get_list)){
        ?>
          <tr>
            <td><a href="swearing_view.php?swearingID=<?=$row['swearingID']?>"><?=htmlspecialchars($row['swearingID'])?></a></td> <td><a><?=htmlspecialchars($row['swearingTitle'])?></a></td> <td><a><?=htmlspecialchars($row['userID'])?></a></td> <td><a><?=htmlspecialchars($row['swearingDate'])?></a></td>
          </tr>
        <?php 
          }
        ?>
      </tbody>
    </table>
    <?=$page_list?>
  </section>
</body>
</html>