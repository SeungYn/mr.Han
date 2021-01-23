<?php
require_once('user.php');
require_once('userDAO.php');
$conn = mysqli_connect(
  'localhost',
  'root',
  'tmddbs3124',
  'han'
);
$user = new User;
$userDAO = new UserDAO;
$user->setUserID("새로운거");
$user->setUserPassword("새로운거");
$user->setUserEmail("새로운거");

$sql = "INSERT INTO user VALUES (?,?,?)";
$stmt = mysqli_prepare($conn,$sql);
$userID = "새로운거";// $user->getuserID();
$userPassword = "새로운거";//$user->getuserPassword();
$userEmail = "새로운거";//$user->getuserEmail();
$a = "새로운거1";
$b = "새로운거";
$c = "새로운거";
echo $userID;
//mysqli_stmt_bind_param($stmt,"sss",$userID,$userPassword,$userEmail);
mysqli_stmt_bind_param($stmt,"sss",$a,$b,$c);
$stmt->execute();
echo "asd";

?>