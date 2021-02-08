<?php 
    session_start();
    if(isset($_SESSION['userID'])){
        echo $_SESSION['userID'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- info -->
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
                    <a href="#"><li>갤러리1</li></a>
                    <li>갤러리2</li>
                </ul>
            </li>
        </ul>
    </nav>

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