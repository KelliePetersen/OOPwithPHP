<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

/*
Building all your functionality into an inheritance structure can result in an explosion of classes in a system.
As you apply similar modifications to different branches of your inheritance tree, you are likely to see duplication emerge.

This is a module for tiles for my Civilization-like game. 
A tile represents a square on which my units might be found. Each tile affects the revenue a particular square
might generate if owned by a player. 

I wish to model the occurrence of diamonds on the landscape, and the damage caused by pollution.
One approach might be to inherit from the Plains object. This structure is inflexible - I couldn't get a tile with both. 
Instead, let's use composition and delegation. 
*/

$tile = new Plains();
print $tile->getWealthFactor(); // 2
// Plains is a component. It simply returns 2

$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor(); // 4
// DiamondDecorator has a reference to a Plains object. It invokes getWealthFactor() before adding its own weighting of 2

$tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
print $tile->getWealthFactor(); // 0

?>