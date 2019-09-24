<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

abstract class Tile
{
  abstract public function getWealthFactor(): int;
}

?>