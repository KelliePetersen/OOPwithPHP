<?php

  /*  Multiple inheritance (having multiple parents) doesn't exist in PHP but its functionality can be implemented with Interfaces.
      INTERFACES are useful for passing functions down to other classes. For example, you migh thave a set of classes that need to 
      be able to display themselves. Instead of having a parent class with a display() function, you can implement an interface.   */
  
      interface Displayable
  {
    function display();
  }

  class webPage implements Displayable
  {
    function display()
    { }
  }

  /*  TRAITS allow you to group together functionality that can be used in multiple classes. Classes can use multiple traits, and
      traits can inherit from one another. Traits' methods override inherited methods, but can still be overriden. */

  trait fileLogger {
    public function logmessage($message, $level='DEBUG') {
      echo "Successfully wrote message to log";
    }
  }

  trait sysLogger {
    public function logmessage($message, $level='ERROR') {
      echo "Successfully wrote message to system log";
    }
  }

  class fileStorage {
    use fileLogger, sysLogger {                                   //Use traits and set method names of traits with shared method names
      fileLogger::logmessage insteadof sysLogger;                 //fileLogger::logmessage is called with logmessage instead of sysLogger::logmessage
      sysLogger::logmessage as private logsysmessage;             //sysLogger::logmessage is renamed to logsysmessage
    }
    function store($data) {
      $this->logmessage($message);
      $this->logsysmessage($message);
    }
  }

?>