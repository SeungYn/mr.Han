<?php 
  class User{
      private $userID;
      private $userPassword;
      private $userEmail;

      public function __constructor(){

      } 
      public function setUserID($userID){
        $this->userID = $userID;
      }

      public function getuserID(){
        return $this->userID;
      }

      public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
      }

      public function getuserPassword(){
        return $this->userPassword;
      }

      public function setUserEmail($userEmail){
        $this->userEmail = $userEmail;
      }

      public function getuserEmail(){
        return $this->userEmail;
      }
  }
?>