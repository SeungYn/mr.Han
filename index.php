<?php 
    session_start();
    require('swearingDAO.php');
    $swearingDAO = new SwearingDAO;
    if(isset($_SESSION['userID'])){
        $write_count = $swearingDAO->getSwearingCount($_SESSION['userID']);
    }
    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav id="navbar">
        <div class="navbar__logo">
            <a href="index.php"><img src="image/인트로한준영.jpg" width="50" height="100%"></a>
            <a href="index.php">Hanㅗ</a>
        </div>
        <ul class="navbar__menu">
            <li><a href="swearing.php">게시판</a></li>
            <li><a href="#">갤러리</a>
                <ul class="navbar__menu__gallery">
                    <a href="gallery/gallery1.php"><li>갤러리1</li></a>
                    <li>갤러리2</li>
                </ul>
            </li>
        </ul>
    </nav>
    <?php 
        if(isset($_SESSION['userID'])){
    ?>
    <!-- info -->
    <div class="sideMenu">
        <div class="sideMenu__info">
            내가쓴 게시물 갯수 : <?=$write_count?>개
            <p>내정보2</p>
            <p>내정보3</p>
        </div>
        <div class="sideMenu__bottom">
            <a href="logoutAction.php" class="sideMenu__bottom__logout">로그아웃</a>
            <img class="sideMenu__button__on"src="image/준영이친구.jpg" width="30" height="30" style="border-radius:50%;">
            <img class="sideMenu__button__close"src="image/한준영버스.jpg" width="30" height="30" style="border-radius:50%; margin=0;">
        </div>
    </div>
    <?php }?>

    <!-- Home -->
    <section id="home">
        <image class="home__avatar" src="image/개패고싶은사진.jpg"
        onmouseover="this.src='image/한대치고싶은사진.jpg'"
        onmouseout="this.src='image/개패고싶은사진.jpg'"
        ></image>
            <?php
                if(!isset($_SESSION['userID'])){
            ?>
                <div class="homeBtn__container">
                    <button class="btn" onclick="location.href='login.php'"><p>로그인</p></button>
                    <button class="btn" onclick="location.href='join.php'"><p>회원가입</p></button>
                </div>
            <?php
                }
            ?>
            
    </section>
</body>
</html>