<?php

namespace phpbox\phpadvanced\factory;
require __DIR__."/../../../vendor/autoload.php";

/*
Imagine a personal organizer that manages Appointment objects, among other object types. You must communicate 
appointment data to other businesses using a format called BloggsCal. More formats may be added.
You need a data encoder that converts your Appointment objects into a proprietary format - ApptEncoder.
You need a manager that will retrieve an encoder and work with it to communicate with a third party - CommsManager. 
Using factory pattern terminology, the CommsManager is the creator, and the ApptEncoder is the product.
*/

/*
The CommsManager class is responsible for generating BloggsApptEncoder objects. When I am required to implement 
other formats, supporting it is simply a matter of writing a new implementation for my abstract classes.
*/

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();

?>