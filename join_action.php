<?php 
  require_once('user.php');
  require_once('userDAO.php');

  $user = new User;
  $userDAO = new UserDAO;

  $user->setUserID(mysqli_real_escape_string($userDAO->conn,$_POST['userID']));
  $user->setUserPassword(mysqli_real_escape_string($userDAO->conn,$_POST['userPassword']));
  $user->setUserEmail(mysqli_real_escape_string($userDAO->conn,$_POST['userEmail']));


  $sql = "SELECT userID FROM user WHERE userID='{$user->getUserID()}'";
  $rs = mysqli_query($userDAO->conn,$sql);
  $check = mysqli_num_rows($rs);

  if($user->getUserID() == null || $user->getUserPassword() == null|| $user->getUserEmail() == null){
    echo "<script> alert('비어있는 항목이 있습니다.')</script>";
    echo "<script> history.back()</script>";
  }

  if($check>0){
    echo "<script> alert('이미 존재하는 아이디')</script>";
    echo "<script> history.back()</script>";
  }else{
    $userDAO->join($user);
    echo "<script> location.href='index.php' </script>";
  }

?>