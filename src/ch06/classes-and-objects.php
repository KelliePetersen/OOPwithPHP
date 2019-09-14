<?php

  class MyClass {
    function __construct ($param) {
      echo "Constructor called with parameter {$param} \n";
    }

    public $color;
    private $greeting = "Hello";
    private $name;
  
    public function change_color($newColor) {
      $this->color = $newColor;
    }

    public function greet($name) {
      echo "$this->greeting, $name \n";
    }

    // ACCESSOR FUNCTIONS - Used to access the private/protected attributes of a class (Single access point)
    public function __get($name) {
      return $this->$name;
    }
    public function __set($name, $value) {
      $this->$name = $value;
    }
  }
  
  $myObject = new MyClass('MyObject');
  $y = $myObject->greet('Sally');
  $myObject->name = 'Bob';
  echo $myObject->name;
?>