<?php

namespace phpbox\phpadvanced\prototype;

class TerrainFactory
{
  private $sea;
  private $forest;
  private $plains;

  public function __construct(Sea $sea, Plains $plains, Forest $forest)
  {
    $this->sea = $sea;
    $this->plains = $plains;
    $this->forest = $forest;
  }
  
  public function getSea(): Sea
  {
    return clone $this->sea;
  }
  public function getPlains(): Plains
  {
    return clone $this->plains;
  }
  public function getForest(): Forest
  {
    return clone $this->forest;
  }
}

?>