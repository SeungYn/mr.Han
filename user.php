<?php 
  class Users{
      private $userID;
      private $userPassword;
      private $userEmail;

      public function __constructor(){

      } 
      public function setUserID($userID){
        $this->$userID = $userID;
      }

      public function getuserID(){
        return $userID;
      }

      public function setUserPassword($userPassword){
        $this->$userPassword = $userPassword;
      }

      public function getuserPassword(){
        return $userPassword;
      }

      public function setUserEmail($userEmail){
        $this->$userEmail = $userEmail;
      }

      public function getuserEmail(){
        return $userEmail;
      }
  }
?>