<?php 
  session_start();
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
      <div class="swearing__write">
        <form action="swearing_writeAction.php" method="post">
          <h3>글쓰기</h3>
          <input type="text" name="swearingTitle" class="input__title" maxlength="50" placeholder="제목">
          <textarea name="swearingContent" class="input__content" maxlength="4096" placeholder="내용"></textarea>
          <input type="submit" value="글쓰기" class="swearing__submit">
        </form>
      </div>
  </section>
  
</body>
</html>