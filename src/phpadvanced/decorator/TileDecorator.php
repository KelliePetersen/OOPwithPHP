<?php

namespace phpbox\phpadvanced\decorator;
require __DIR__."/../../../vendor/autoload.php";

abstract class TileDecorator extends Tile
{
  protected $tile;
  public function __construct(Tile $tile)
  {
    $this->tile = $tile;
  }
}

?>