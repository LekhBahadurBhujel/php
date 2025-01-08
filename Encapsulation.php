<?php
class Employee{
        private $name;
        private $age;
        private $email;
    
        //function __construct($name, $age, $email){
        function setProperties($name, $age, $email){
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
        }
            
        function getName(){
            return $this->name;
        }
        
        function getAge(){
            return $this->age;
        }
        
        function getEmail(){
            return $this->email;
        }
    }
    
    //$obj1 = new Employee("Hari", 25, "Hari@gmail.com");
    $obj1 = new Employee();
    $obj1->setProperties("Ram", 25, "ram@gmail.com");
    echo "Name: " . $obj1->getName() . "<br>";
    echo "Age: " . $obj1->getAge() . "<br>";
    echo "Email: " . $obj1->getEmail() . "<br>";
    ?>