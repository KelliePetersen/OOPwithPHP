<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

class DiamondDecorator extends TileDecorator
{
  public function getWealthFactor(): int
  {
    return $this->tile->getWealthFactor() + 2;
  }
}

?>