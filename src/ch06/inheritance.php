<?php

  //Extended classes get all PUBLIC/PROTECTED attributes/methods
  //Protected values are not visible outside the class (unlike public), but can be inherited (unlike private)
  //Adding final before classes (final class Vehicle {}) prevents them from being subclassed

  class Vehicle {
    public $overrideAttribute = 'Old';
    public function overrideMethod() {
      echo "The value of overrideAttribute is {$this->overrideAttribute} \n";
    }
    final function neverOverride() {
      echo "This method cannot be overriden";
    }
    private function operation1() {
      echo "operation1 called \n";
    }
    protected function operation2() {
      echo "operation2 called \n";
    }
    public function operation3() {
      echo "operation3 called \n";
    }
  }

  class Car extends Vehicle {
    function __construct() {     //Construct performs its contained operations immediately
      // $this->operation1();    //Fatal Error: call to private method
      $this->operation2();    
      $this->operation3();
    }
    public $overrideAttribute = 'New';      //replaces parent's attribute/method with these new ones
    public function overrideMethod() {
      echo "The NEW value of overrideAttribute is {$this->overrideAttribute} \n";
    }
    public function parentOverrideMethod() {    //Calls parent's overriden method, but uses child's attribute
      parent::overrideMethod();
    }
  }

  $mustang = new Car;          //calls all methods in __construct
  // $mustang->operation2();   //fails because protected methods are not visible outside class. Only works in __construct
  $mustang->overrideMethod();
  $mustang->parentOverrideMethod();   //Calls parent's overriden method, but uses child attribute

?>