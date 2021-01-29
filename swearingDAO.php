<?php 
  class SwearingDAO{
    public $conn;
    private $result;

    public function __construct(){
      $this->conn = mysqli_connect(
        'localhost',
        'root',
        'tmddbs3124',
        'han'
      );
    }

    public function getDate(){
      $sql = "SELECT now()";
      $this->result= mysqli_query($this->conn,$sql);
      $date = mysqli_fetch_row($this->result);
      if($this->result){
        return $date[0];
      }
      return "2012-12-12 12:12:12";
    }

    public function write($swearingTitle,$userID,$now,$swearingContent){
      $sql = "INSERT INTO swearing VALUES (?,?,?,?,?,?)";
      $stmt = mysqli_prepare($this->conn,$sql);
      $f=0;
      $l=1;
      mysqli_stmt_bind_param($stmt,"issssi",$f,$swearingTitle,$userID,$now,$swearingContent,$l);
      mysqli_stmt_execute($stmt);
      return 1;
    }
  }


?>