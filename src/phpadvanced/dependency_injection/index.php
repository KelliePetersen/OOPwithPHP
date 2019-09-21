<?php

namespace phpbox\phpadvanced\dependency_injection;
require __DIR__."/../../../vendor/autoload.php";

/* 
The AppointmentMaker class gives up control to gain flexibility.
An assembler component takes on the job of object creation. Typically, this approach uses a
configuration file to figure out which implementations should be instantiated. 

I want TerrainFactory to be instantiated with an EarthSea, a MarsPlains, and an EarthForest object. 
I would like AppointmentMaker to be passed a BloggsApptEncoder object.
The assembler class reads this configuration data and instantiates objects on demand.
*/

/*
Once we have an ObjectAssembler, object acquisition takes up a single statement. The AppointmentMaker class is 
free of its previous hard-coded dependency on an ApptEncoder instance. A developer can now use the configuration file 
to control what classes are used at runtime, as well as to test AppointmentMaker in isolation from the wider system.
*/
$assembler = new ObjectAssembler("src/phpadvanced/dependency_injection/objects.xml");
$apptmaker = $assembler->getComponent("\\src\\phpadvanced\\dependency_injection\\AppointmentMaker");
$out = $apptmaker->makeAppointment();
print $out;

?>