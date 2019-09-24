<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

class PollutionDecorator extends TileDecorator
{
  public function getWealthFactor(): int
  {
    return $this->tile->getWealthFactor() - 4;
  }
}

?>