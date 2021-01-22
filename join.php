<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="join.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <!-- Login -->
  <section id="login">
    <div class="form__background">
      <div class="login__menu">
        <div class="loginbox"><h3><a href="login.html">로그인</a></h3></div>
        <div class="loginbox"><h3><a href="join.html">회원가입</a></h3></div>
      </div>
      <div class="login__form">
        <form method="post" action="join_action.php">
          <div class="form__group">
            <input type="text" placeholder="아이디" name="userID">
            <input type="password" placeholder="비밀번호" name="userPassword">
            <input type="email" placeholder="이메일" name="userEmail">
            <input type="submit" value="회원가입">
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>