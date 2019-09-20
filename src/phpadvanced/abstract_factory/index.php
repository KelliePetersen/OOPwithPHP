<?php

namespace phpbox\phpadvanced\abstract_factory;
require __DIR__."/../../../vendor/autoload.php";

/*
Imagine a personal organizer that manages Appointment objects, among other object types. You must communicate 
appointment data to other businesses using a format called BloggsCal. More formats may be added.
You need a data encoder that converts your Appointment objects into a proprietary format - ApptEncoder.
You need a manager that will retrieve an encoder and work with it to communicate with a third party - CommsManager. 
Using factory pattern terminology, the CommsManager is the creator, and the ApptEncoder is the product.
*/

/*
The abstract CommsManager class defines the interface for generating each of the three products
(ApptEncoder, TtdEncoder, and ContactEncoder). You need to implement a concrete creator in order to
actually generate the concrete products for a particular family.
*/

/*
•	 This pattern decouples the system from the details of implementation. I can add or remove
any number of encoding formats in my example without causing a knock-on effect.
•	 It enforces the grouping of functionally related elements of my system. So, by using
BloggsCommsManager, I am guaranteed that I will work only with BloggsCal-related classes.
*/

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();

?>