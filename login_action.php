<?php 
  require_once('user.php');
  require_once('userDAO.php');

  $user = new User;
  $userDAO = new UserDAO;

  $user->setUserID(mysqli_real_escape_string($userDAO->conn,$_POST['userID']));
  $user->setUserPassword(mysqli_real_escape_string($userDAO->conn,$_POST['userPassword']));
  

  if($user->getUserID() == null || $user->getUserPassword() == null){
    echo "<script> alert('비어있는 항목이 있습니다.')</script>";
    echo "<script> history.back()</script>";
  }

  $result = $userDAO->login($user->getUserID(),$user->getUserPassword());
  if($result==-1){
    echo "<script> alert('데이터베이스 오류입니다.')</script>";
    echo "<script> history.back()</script>";
  }else if($result==1){
    echo "<script> alert('존재하지 않는 아이디입니다.')</script>";
    echo "<script> location.href='login.php' </script>";
  }else if($result==-2){
    echo "<script> alert('비밀번호가 틀렸습니다.')</script>";
    echo "<script> location.href='login.php' </script>";
  }else{
    echo "<script> alert('로그인 성공.')</script>";
    echo "공사중";
  }

?>