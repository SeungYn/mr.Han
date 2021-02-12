<?php 
  $dir ="../image/한준영슬라이드";
  $images = scandir($dir);
  $hans = array();
  for($i=0;$i<count($images);$i++){
    if($images[$i]=="."||$images[$i]==".."){
      continue;
    }
    array_push($hans,$images[$i]);
  }

  $han_list="";
  for($i=0;$i<count($hans);$i++){
    $han_list.="<li><image src='../image/한준영슬라이드/$hans[$i]'></li>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <script src="../js/gallery.js" defer></script>
    <title>Document</title>
</head>
<body>
  <!-- navbar -->
  <nav id="navbar">
    <div class="navbar__logo">
        <a href="index.php"><img src="../image/인트로한준영.jpg" width="50" height="100%"></a>
        <a href="index.php">Hanㅗ</a>
    </div>
    <ul class="navbar__menu">
        <li><a href="swearing.php">게시판</a></li>
        <li><a href="#">갤러리</a>
            <ul class="navbar__menu__gallery">
                <a href="gallery/gallery1.html"><li>갤러리1</li></a>
                <li>갤러리2</li>
            </ul>
        </li>
    </ul>
  </nav>
  <!-- han slide -->
  <div class="han__slide__wrapper">
    <ul class="han__slide" id="han__slide">
      <?=$han_list?>
    </ul>
    <span class="prew">이전</span>
    <span class="next">다음</span>
  </div>  

</body>
</html>