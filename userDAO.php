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
      $sql = "SELECT userPassword FROM user WHERE userID='$userID'";
      
      $this->result = mysqli_query($this->conn,$sql);
      if($this->result===false){ 
        return -1;//데이터베이스 오류
      }else{
        if($row = mysqli_fetch_assoc($this->result)){
          if(strcmp($row['userPassword'],$userPassword)===0){
            return 0;//로그인 성공
          }else{
            return -2;//비밀번호 틀림
          }
        }else{
          return 1;//아이디가 없음
        }
      }

    }

    public function join($user){
      $sql = "INSERT INTO user VALUES (?,?,?)";
      $this->pstmt = mysqli_prepare($this->conn,$sql);
      $userID = $user->getuserID();
      $userPassword = $user->getuserPassword();
      $userEmail = $user->getuserEmail();

      mysqli_stmt_bind_param($this->pstmt,"sss",$userID,$userPassword,$userEmail);
      mysqli_stmt_execute($this->pstmt);
      mysqli_stmt_close($this->pstmt);
    }
  }
?>