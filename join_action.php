<?php 
  require_once('user.php');
  require_once('userDAO.php');

  $user = new Users;
  $userDAO = new userDAO;

  $user->setUserID = mysqli_real_escape_string($userDAO->$conn,$_POST['userID']);
  $user->setUserPassword = mysqli_real_escape_string($userDAO->$conn,$_POST['userPassword']);
  $user->setUserEmail = mysqli_real_escape_string($userDAO->$conn,$_POST['userEmail']);

  

  $sql = "SELECT userID FROM user WHERE userID='{$user->setUserID}'";
  $rs = mysqli_query($userDAO->$conn,$check);
  $check = mysqli_num_rows($rs);

  if($user->setUserID == null || $user->setUserPassword == null|| $user->setUserEmail == null){
    echo "<script> alert('비어있는 항목이 있습니다.')</script>";
    echo "<script> history.back()</script>";
  }

  if($check>0){
    echo "<script> alert('이미 존재하는 아이디')</script>";
    header('Location: /join.php');
  }
  $userDAO->join($user);

?>