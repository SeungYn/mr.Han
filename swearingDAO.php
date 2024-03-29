<?php 
  class SwearingDAO{
    public $conn;
    private $result;

    public function __construct(){
      $this->conn = mysqli_connect(
        '127.0.0.1',
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
      $sql = "alter table swearing auto_increment = 1";
      mysqli_query($this->conn,$sql);
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

    public function delete($swearingID){
      $sql = "UPDATE swearing SET swearingAvailable = 0 WHERE swearingID = ?";
      $stmt = mysqli_prepare($this->conn,$sql);
      mysqli_stmt_bind_param($stmt,"i",$swearingID);
      $result = mysqli_stmt_execute($stmt);
      if($result == 1){
        return 1; //삭제성공
      }
      return 0; //삭제실패
    }

    public function cloneSwearing(){
      $sql= "INSERT INTO deleteSwearing SELECT swearingID,swearingTitle,userID,swearingDate,swearingContent from swearing";
      $result = mysqli_query($this->conn,$sql);
      if($result==1){
        return 1; //복사성공
      }
      return 0; //복사실패
    }

    public function deleteSwearing(){
      $sql = "DELETE FROM swearing WHERE swearingAvailable = 0";
      $result = mysqli_query($this->conn,$sql);
      if($result ==1){
        return 1;//삭제성공
      }
      return 0;//삭제실패
      
    }

    public function reindexing(){
      $sql = "ALTER TABLE swearing AUTO_INCREMENT=1";
      mysqli_query($this->conn,$sql);
      $sql= "SET @cnt=0";
      mysqli_query($this->conn,$sql);
      $sql="UPDATE swearing SET swearingID=@cnt:=@cnt+1";
      mysqli_query($this->conn,$sql);
    }

    //게시글수 가져오기
    public function getSwearingCount($userID){
      $sql = "SELECT COUNT(*) FROM swearing WHERE userID=?";
      $stmt = mysqli_prepare($this->conn,$sql);
      mysqli_stmt_bind_param($stmt,"s",$userID);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $rs = mysqli_fetch_row($result);

      return $rs[0];
    }


  }
?>