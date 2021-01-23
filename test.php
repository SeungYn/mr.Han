
<?php
  require_once('user.php');
  require_once('userDAO.php');

  $user = new User;
$userDAO = new UserDAO;
  $conn = mysqli_connect(
    'localhost',
    'root',
    'tmddbs3124',
    'han'
  );

   
   $sql = "INSERT INTO user VALUES(?,?,?)";
  $stmt = mysqli_prepare($conn,$sql);


$tmddbs = "새로운asdddd거";  //$user->getuserID();
$w = "1234";  //$user->getuserPassword();
$e = "1234";  //$user->getuserEmail();
  $qwe = "머때문에 asddsade안되노";
  $b="1234";
  $c="1234";

  $result = mysqli_stmt_bind_param($stmt,"sss",$tmddbs,$b,$c);
  //$result = mysqli_stmt_bind_param($stmt,"sss",$q,$w,$e);
 
  
 $re = $stmt->execute();
 var_dump($re); 
 echo $re;

/*
$user = new User;
$userDAO = new UserDAO;
$user->setUserID("asdf");
$user->setUserPassword("qwe");
$user->setUserEmail("eqw");

$sql = "INSERT INTO user VALUES (?,?,?)";
$stmte = mysqli_prepare($conn,$sql);
$userID = "asd";//$user->getuserID();
$userPassword = "asd";//$user->getuserPassword();
$userEmail = "asd";//$user->getuserEmail();
echo $userID;
$asd = mysqli_stmt_bind_param($stmte,"sss",$userID,$userPassword,$userEmail);
$stmte->execute();
*/
echo "asd";


  $a ="tmddbs";
  $sql= "SELECT userID FROM user WHERE userID = 'tmeddbs'";
  $result = mysqli_query($conn,$sql);
  
  
  $row = mysqli_num_rows($result);
  echo $row;

  $asd = new User;
  $userDAO = new userDAO;

  class aA{
    public $aa;
    public $bb;
    public function __construct(){
      $this->aa="asd";
    }
    public function test(){
      $this->bb="asddd";
    }

    public function gettest(){
      return $this->bb;
    }
  }

  $nnn = new aA;
  $nnn->test();
  echo $nnn->gettest();
  $aaaa="";
  $nnn->aa = mysqli_real_escape_string($conn,$aaaa);
  echo $nnn->aa;
?>