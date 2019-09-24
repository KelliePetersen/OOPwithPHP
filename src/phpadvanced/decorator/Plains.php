<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

class Plains extends Tile
{
  private $wealthfactor = 2;
  public function getWealthFactor(): int
  {
    return $this->wealthfactor;
  }
}

?>