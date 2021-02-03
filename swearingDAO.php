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

    public function getListNum(){
      $sql="SELECT COUNT(*) FROM swearing WHERE swearingAvailable = 1";
      $result = mysqli_query($this->conn,$sql);
      $num = mysqli_fetch_row($result);

      return $num[0];
    }

    public function getList($page,$limit){
      $sql = "SELECT * FROM swearing WHERE swearingAvailable = 1 AND swearingID <= ? ORDER BY swearingID DESC LIMIT ?";
      $stmt = mysqli_prepare($this->conn,$sql);
      mysqli_stmt_bind_param($stmt,"ii",$page,$limit);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      
      return $result;
    }

    public function getSwearing($swearingID){
      $sql = "SELECT * FROM swearing WHERE swearingID=?";
      $stmt = mysqli_prepare($this->conn,$sql);
      mysqli_stmt_bind_param($stmt,"i",$swearingID);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $rs = mysqli_fetch_assoc($result);
      return $rs;
    }
    
    public function update($swearingID,$swearingTitle,$swearingContent,$swearingDate){
      $sql="UPDATE swearing SET swearingTitle=?, swearingContent=? ,swearingDate=? WHERE swearingID = ?";
      $stmt = mysqli_prepare($this->conn,$sql);
      mysqli_stmt_bind_param($stmt,"sssi",$swearingTitle,$swearingContent,$swearingDate,$swearingID);
      $result = mysqli_stmt_execute($stmt);
      if($result==1){
        return 1; //업데이트 성공
      }
      return 0; //업데이트 실패

    }
  }


?>