<?php

namespace phpbox\phpadvanced\composition;

abstract class Lesson {
  private $duration;
  private $costStrategy;

  public function __construct(int $duration, CostStrategy $strategy) {
    $this->duration = $duration;
    $this->costStrategy = $strategy;
  }

  public function cost(): int {
    return $this->costStrategy->cost($this);
  }
  public function chargeType(): string {
    return $this->costStrategy->chargeType();
  }
  public function getDuration(): int {
    return $this->duration;
  }
}

?>