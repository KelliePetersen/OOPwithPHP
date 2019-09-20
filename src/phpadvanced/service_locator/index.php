<?php

namespace phpbox\phpadvanced\service_locator;
require __DIR__."/../../../vendor/autoload.php";

/*
The Settings class includes a flag for calendar protocol types.
The AppConfig class uses the flag to decide which CommsManager to serve on request. 
It is quite common to see a Singleton used in conjunction with the Abstract Factory pattern.
*/

/*
The AppConfig class is a standard Singleton. I can get an AppConfig instance anywhere
in the system, and always get the same one. The init() method is invoked by the class’s constructor
and is therefore only run once in a process. It tests the Settings::$COMMSTYPE property, instantiating a
concrete CommsManager object according to its value. Now my script can get a CommsManager object and work
with it without ever knowing about its concrete implementations or the concrete classes it generates.
*/
$commsMgr = AppConfig::getInstance()->getCommsManager();
$commsMgr->getApptEncoder()->encode();

/*
Because AppConfig manages the work of finding and creating components for us, it is an instance of
the Service Locator pattern. It’s neat but it does introduce a more benign dependency than direct instantiation. 
Any classes using its service must explicitly invoke this monolith, binding them to the wider system. 
For this reason, some prefer other approaches, such as the Dependency Injection pattern. 
*/

?>