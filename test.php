
<?php
  require_once('user.php');
  require_once('userDAO.php');
  $conn = mysqli_connect(
    'localhost',
    'root',
    'tmddbs3124',
    'han'
  );

  /* $sql = "INSERT INTO user VALUES(?,?,?)";
  $stmt = mysqli_prepare($conn,$sql);
  $a = "tmddbs";
  $b="1234";
  $c="1234";
  
  $result = mysqli_stmt_bind_param($stmt,"sss",$a,$b,$c);
  echo $result;
  
  $asdf = $stmt->execute(); */
  $a ="tmddbs";
  $sql= "SELECT userID FROM user WHERE userID = 'tmeddbs'";
  $result = mysqli_query($conn,$sql);
  
  
  $row = mysqli_num_rows($result);
  echo $row;

  $asd = new Users;
  $userDAO = new userDAO;

  class aA{
    public $aa = "asd";
  }
  $nnn = new aA;
  echo $nnn->$aa;

?>