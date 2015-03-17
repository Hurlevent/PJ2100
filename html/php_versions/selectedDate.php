<?php
class SelectedDate{
    private $dateSelected = null;

    public function __construct(){
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        if(!isset($_POST["dato"])){
           $this->dateSelected = date('Y/m/d', $timestamp); // dagens dato
        } else {
            $this->dateSelected = $_POST["dato"];
        }
    }

    public function getSelectedDate(){
        return $this->dateSelected;
    }

    public function setNewDate($newdate){
        $this->dateSelected = $newdate;
    }
}