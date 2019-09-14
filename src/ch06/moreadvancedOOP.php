<?php 

  // CONVERTING CLASSES TO STRINGS - __toString() is automatically called if you try to print a class.
  // var_export() prints out all the attribute values in the class.
  class Printable {
    public $testone;
    public $testtwo;
    public function __toString() {
      return (var_export($this, TRUE));
    }
  }
  $p = new Printable;
  echo $p;

  /*  REFLECTION API - Reflection is the ability to interrogate existing classes and objects to find out about their structure and contents. 
      This is useful when you are interfacing to unknown or undocumented classes, such as when interfacing with encoded PHP scripts.  */

  require_once("page.php");
  $class = new ReflectionClass("Page");
  echo $class;

?>