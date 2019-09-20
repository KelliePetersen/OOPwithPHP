<?php

namespace phpbox\phpadvanced\singleton;
require __DIR__."/../../../vendor/autoload.php";

/*
A static method cannot access object properties because it is invoked in a class and not an object context. 
It can, however, access a static property. When getInstance() is called, it checks to see if 
Preferences::$instance is empty, then I create an instance of the Preferences class and
store it in the property. Then I return the instance to the calling code. Because the static getInstance()
method is part of the Preferences class, I have no problem instantiating a Preferences object, even though
the constructor is private.
*/

$pref = Preferences::getInstance();
$pref->setProperty("name", "matt");
unset($pref); // remove the reference
$pref2 = Preferences::getInstance();
print $pref2->getProperty("name") . "\n"; // demonstrate value is not lost


?>