<?php

/* GENERATORS are similar to iterators but simpler. They look like functions, but behave like iterators. 
    The difference in how you write a generator versus a funciton is that instead of using the "return" keyword,
    you use the "yield" keyword. This is typically inside a loop, because you will use it to return multiple values. 
    The most valuable thing about generators is that GENERATORS KEEP STATE. */

function fizzbuzz($start, $end) {
  $current = $start;
  while ($current <= $end) {
    if ($current % 3 == 0 && $current % 5 == 0) {
      yield "fizzbuzz";
    } else if ($current % 3 == 0) {
      yield "fizz";
    } else if ($current % 5 == 0) {
      yield "buzz";
    } else {
      yield $current;
    }
    $current++;
  }
}

/*  Generators should be called in a foreach loop. This creates a Generator object that effectively saves the state inside 
    the generator function. On each iteration of the external foreach loop, the generator advances one internal iteration. */

foreach (fizzbuzz(1, 20) as $number) {
  echo $number."\n";
}
?>
