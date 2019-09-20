<?php

namespace phpbox\phpadvanced\prototype;
require __DIR__."/../../../vendor/autoload.php";

/* SCENARIO
A Civilization-style game in which units operate on a grid of tiles. Each tile can represent sea, plains, or forests. 
Terrain type impacts movement and combat abilities. 

ABSTRACT FACTORY PATTERN SOLUTION
You might have a TerrainFactory object that serves up Sea, Forest, 
and Plains objects. Users can choose among radically different environments, so the Sea object is an abstract
superclass implemented by MarsSea and EarthSea. 
This is the same diagram as the Abstract Factory pattern. You have distinct product hierarchies (Sea, Plains, Forests), 
with strong family relationships cutting across inheritance (Earth, Mars).

PROTOTYPE PATTERN SOLUTION
The above requires a large inheritance hierarchy, and it is relatively inflexible. 
When you do not want parallel inheritance hierarchies, and when you need to maximize runtime
flexibility, the Prototype pattern can be used in a powerful variation on the Abstract Factory pattern.
*/

$factory = new TerrainFactory(
  new EarthSea(),
  new EarthPlains(),
  new EarthForest()
);
print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());

// No need to write a new creator class — you can simply change the mix of classes you add to TerrainFactory:
$factory = new TerrainFactory(
new EarthSea(),
new MarsPlains(),
new EarthForest()
);

/* ADVANTAGES
The Prototype pattern allows you to take advantage of the flexibility afforded by composition. 
Because you are storing and cloning objects at runtime, you reproduce object state
when you generate new products. For example, $navigatiblity in Sea objects. The property
influences speed on sea tiles and can be set to adjust the difficulty level of a game.
*/
$factory = new TerrainFactory(
  new EarthSea(-1),
  new EarthPlains(),
  new EarthForest()
);

?>