<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

class DiamondPlains extends Plains
{
  public function getWealthFactor(): int
  {
    return parent::getWealthFactor() + 2;
  }
}

?>