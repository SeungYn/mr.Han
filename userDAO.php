<?php 
  require_once('user.php');
  class UserDAO{
    public $conn;
    private $pstmt;
    private $result;
    
    public function __construct(){
      $this->conn = mysqli_connect(
        'localhost',
        'root',
        'tmddbs3124',
        'han'
      );
    }

    public function login($userID,$userPassword){
      
    }

    public function join($user){
      $sql = "INSERT INTO user VALUES (?,?,?)";
      $this->pstmt = mysqli_prepare($this->conn,$sql);
      $userID = $user->getuserID();
      $userPassword = $user->getuserPassword();
      $userEmail = $user->getuserEmail();

      mysqli_stmt_bind_param($this->pstmt,"sss",$userID,$userPassword,$userEmail);
      mysqli_stmt_execute($this->pstmt);
    }
  }
?>