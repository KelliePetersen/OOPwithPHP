<?php 

namespace phpbox\phpadvanced\SOLID;
require __DIR__ . "/../../../vendor/autoload.php";

class Main {
  public function handleFile($file) {
    $input['file'] = $file;
    return 'Added to Database';
  }
}

class Child extends Main {
  public function handleFile($file) {
    if (!is_object($file)) {
      var_dump('Dead'); die;
    } else {
      return 'Added to Database';
    }
  }
}

/*
Regardless of whether OTHER extends MAIN or CHILD, data should be added to the database without any negative side effects. 
In the current example, it doesn't work, because extending CHILD returns 'Dead', because the parent accepts strings while the child only accepts objects. 
Basically... The descending children of the MAIN class (CHILD) should have the same method signature as the MAIN class. 
*/
class Other extends Main {
  function handleFile($file) {
    return parent::handleFile($file);
  }
}

$other = new Other();
echo $other->handleFile('hello');

?>