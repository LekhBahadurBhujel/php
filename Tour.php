<?php
include "Inheritence.php";
class Tour extends Employee{
    private $canGoToTour;
    function displaycanGoToTour(){
        if($this->age>20){
            $this->canGoToTour = "Yes";
        }
        else{
            $this->canGoToTour = "No";
        }
        echo $this->canGoToTour;
    }
}
$obj1 = new Tour("Ram", 29);
$obj1->displaycanGoToTour();
?>