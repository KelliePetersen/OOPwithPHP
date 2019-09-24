<?php

namespace phpbox\phpadvanced\composite;

/*
The addUnit() method checks whether I have already added the same Unit object before storing it in
the private $units array property. removeUnit() uses a similar check to remove a given Unit object from the
property.

Army objects, then, can store Units of any kind, including other Army objects, or leaves such as
Archer or LaserCannonUnit. Because all units are guaranteed to support bombardStrength(), our
Army::bombardStrength() method simply iterates through all the child Unit objects stored in the $units
property, calling the same method on each.

One problematic aspect of the Composite pattern is the implementation of add and remove
functionality. The classic pattern places add() and remove() methods in the abstract super class. This
ensures that all classes in the pattern share a common interface. Leaf classes must also provide an implementation.
*/

class Army extends Unit
{
  private $units = [];
  public function addUnit(Unit $unit)
  {
    if (in_array($unit, $this->units, true)) {
      return;
    }
    $this->units[] = $unit;
  }
  public function removeUnit(Unit $unit)
  {
    $idx = array_search($unit, $this->units, true);
    if (is_int($idx)) {
      array_splice($this->units, $idx, 1, []);
    }
  }
  public function bombardStrength(): int
  {
    $ret = 0;
    foreach ($this->units as $unit) {
      $ret += $unit->bombardStrength();
    }
    return $ret;
  }
}


/*
BAD METHOD
This method is acceptable if everything stays as simple as it is. 
But what if I want to combine multiple armies, e.g. multiple players working together?
Each army needs to retain its own identity. It's easier to have a TroopCarrier object.
*/
class ArmyBAD
{
  private $units = [];
  public function addUnit(Unit $unit)
  {
    array_push($this->units, $unit);
  }
  public function bombardStrength(): int
  {
    $ret = 0;
    foreach ($this->units as $unit) {
      $ret += $unit->bombardStrength();
    }
    return $ret;
  }
}

?>