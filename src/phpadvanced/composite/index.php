<?php

namespace phpbox\phpadvanced\composite;
require __DIR__."/../../../vendor/autoload.php";

/*
I am designing a system based on a game called Civilization. A player has an army made up of units.
Each unit has a different attack value. The Army class object keeps track of the number of units and calculates bombard strength. 

The Composite pattern defines a single inheritance hierarchy that lays down two distinct sets of
responsibilities. We have already seen both of these in our example. Classes in the pattern must support
a common set of operations as their primary responsibility. For us, that means the bombardStrength()
method. Classes must also support methods for adding and removing child objects.
*/

// create an army
$main_army = new Army();
// add some units
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
// create a new army
$sub_army = new Army();
// add some units
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
// add the second army to the first
$main_army->addUnit($sub_army);
// all the calculations handled behind the scenes
print "attacking with strength: {$main_army->bombardStrength()}\n";

?>