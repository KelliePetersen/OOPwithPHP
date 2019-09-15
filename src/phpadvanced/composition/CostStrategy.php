<?php

namespace phpbox\phpadvanced\composition;

abstract class CostStrategy {
  abstract public function cost(Lesson $lesson): int;
  abstract public function chargeType(): string;
}

?>