<?php
class Employee{
    protected $name;
    protected $age;

    function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
}
?>