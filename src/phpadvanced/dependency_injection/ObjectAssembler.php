<?php 

/*
Most of the action takes place in configure(). The method accepts a path which is passed on from the constructor.
It uses the simplexml extension to parse the configuration XML. For every <class> element, I extract the class name 
and store it in $name. Then I acquire all the <arg> subelements, all of which have their own class names. 
I store the arguments in an array named $args, ordered according to the XML num argument. 

I pack all of this in an anonymous function which I store in the $components property. 
This function, which instantiates a requested class and all its required objects, is only invoked when getComponent() 
is called with the correct class name. In this way the ObjectAssembler can maintain a pretty small footprint. 
Note the use of a closure here. The anonymous function has access to the $name and $args variables declared in the 
scope of its creation, thanks to the use keyword.

A robust implementation would handle way more than this, like objects having parameters, and caching.
*/

class ObjectAssembler
{
  private $components = [];

  public function __construct(string $conf)
  {
    $this->configure($conf);
  }

  private function configure(string $conf)
  {
    $data = simplexml:load_file($conf);
    foreach ($data->class as $class) {
      $args = [];
      $name = (string)$class['name'];
      foreach ($class->arg as $arg) {
        $argclass = (string)$arg['inst'];
        $args[(int)$arg['num']] = $argclass;
      }
      ksort($args);
      $this->components[$name] = function () use ($name, $args) {
        $expandedargs = [];
        foreach ($args as $arg) {
          $expandedargs[] = new $arg();
        }
        $rclass = new \ReflectionClass($name);
        return $rclass->newInstanceArgs($expandedargs);
      };
    }
  }

  public function getComponent(string $class)
  {
    if (! isset($this->components[$class])) {
      throw new \Exception("unknown component '$class'");
    }
    $ret = $this->components[$class]();
    return $ret;
  }
}

?>