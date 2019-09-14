<?php 

  //PER-CLASS CONSTANTS - attributes declared with const can be accessed without instantiating the class.
  //STATIC METHODS - methods declared with static can be accessed without instantiating the class. You cannot use the 'this' keyword in static methods.

  class Math {
    const pi = 3.14159;
    static function squared($input) {
      return $input*$input;
    }
  }

  echo "Math::pi = ".Math::pi."\n";
  echo "Math::squared = ".Math::squared(9)."\n";

  //Check Class Type
  $a = new Math();
  echo $a instanceof Math;

  //Class Type Hinting
  function check_hint(Math $object) {
    echo "\nThis object is an instance of class Math \n";
  }
  check_hint($a);

  /*  LATE STATIC BINDING - In an inheritance hierarchy with multiple implementations of the same function, we can use late static bindings to help specify which class' method to use.
      self::whichclass() returns A twice. Although B overrides whichclass(), when the test() method is called by B, it is executed in the content of A.
      static::whichclass() returns A and B. This is Late Static Binding - changing the context to whichever child called it.  */
  class A {
    public static function whichclass() {
      echo __CLASS__."\n";
    }
    public static function test() {
      self::whichclass();
      static::whichclass();
    }
  }
  class B extends A {
    public static function whichclass() {
      echo __CLASS__."\n";
    }
  }
  A::test();
  B::test();

  // CLONING - copy existing objects. You can optionally define the copying behaviour by creating a method in the base class called __clone()
  class MyClone {
    function __clone() {}
  }
  $clone1 = new MyClone();
  $clone2 = clone $clone1;

  // ABSTRACT CLASSES - These cannot be instantiated. 
  // ABSTRACT METHODS - These provide the signature for a method but no implementation. Must be inside Abstract Classes.
  // Their main use is in a complex class hierarchy where you want to make sure each subclass contains and overrides some particular method; this can also be done with an interface. 
  abstract class Abstraction {
    abstract function operationX($param1, $param2) {}
  }

  // CALL - this can be used to overload methods. Method overloading ... 
  // The call method takes 2 parameters. The name of the method being invoked, and an array of the parameters passed to that method.
  class Overloading {
    public function __call($method, $p) {
      if ($method -- "display") {
        if (is_object($p[0])) {
          $this->displayObject($p[0]);
        } else if (is_array($p[0])) {
          $this->displayArray($p[0]);
        } else {
          $this->displayScalar($p[0]);
        }
      }
    }
  }
  $ov = new Overloading();
  $ov->display(array(1,2,3));
  $ov->display('cat');

?>