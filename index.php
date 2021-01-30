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
    <!-- Home -->
    <section id="home">
        <image class="home__avatar" src="image/캥거루.jpg"></image>
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