<?php

namespace phpbox\phpadvanced\prototype;

class Sea
{
  private $navigability = 0;
  public function __construct(int $navigability)
  {
    $this->navigability = $navigability;
  }
}

?>