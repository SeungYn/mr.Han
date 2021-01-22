<?php 
  require_once('user.php');
  class UserDAO{
    public $conn;
    private $pstmt;
    private $result;
    
    public function __constructor(){
      $conn = mysqli_connect(
        'localhost',
        'root',
        'tmddbs3124',
        'han'
      );
    }

    public function join($user){
      $sql = "INSERT INTO user VALUSES (?,?,?)";

      $pstmt = mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($pstmt,"sss",$user->$userID,$user->$userPassword,$user->$userEmail);
    }
  }
?>