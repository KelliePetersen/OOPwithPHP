<?php

namespace phpbox\phpadvanced\composite;

class TroopCarrier extends CompositeUnit
{
  public function addUnit(Unit $unit)
  {
    if ($unit instanceof Cavalry) {
      throw new UnitException("Can't get a horse on the vehicle");
    }
    parent::addUnit($unit);
  }
  public function bombardStrength(): int
  {
    return 0;
  }
}

?>