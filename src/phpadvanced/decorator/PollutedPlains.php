<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

class PollutedPlains extends Plains
{
  public function getWealthFactor(): int
  {
    return parent::getWealthFactor() - 4;
  }
}

?>