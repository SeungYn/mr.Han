<?php 
  class Swearing{
    private $swearingID;
    private $swearingTitle;
    private $userID;
    private $swearingDate;
    private $swearingContent;
    private $swearingAvailable;

    public function setSwearingID($swearingID){
      $this->swearingID = $swearingID;
    }

    public function getSwearingID(){
      return $this->swearingID;
    }

    public function setSwearingTitle($swearingTitle){
      $this->swearingTitle = $swearingTitle;
    }

    public function getSwearingTitle(){
      return $this->swearingTitle;
    }

    public function setUserID($userID){
      $this->userID = $userID;
    }

    public function getuserID(){
      return $this->userID;
    }
    public function setSwearingDate($swearingDate){
      $this->swearingDate = $swearingDate;
    }

    public function getSwearingDate(){
      return $this->swearingDate;
    }

    public function setSwearingContent($swearingContent){
      $this->swearingContent = $swearingContent;
    }

    public function getSwearingContent(){
      return $this->swearingContent;
    }

    public function setSwearingAvailable($swearingAvailable){
      $this->swearingAvailable = $swearingAvailable;
    }

    public function getSwearingAvailable(){
      return $this->swearingAvailable;
    }
  }
?>