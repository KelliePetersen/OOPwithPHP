<?php

namespace phpbox\phpadvanced\inheritance;

/*
Interfaces help you manage the fact that PHP does not support multiple inheritance.
So interfaces provide types without implementation. But what if you want to share an implementation 
across multiple unrelated classes? PHP 5.4 introduced traits, and these let you do just that.

Traits are used in classes by adding: use PriceUtilities;
*/

trait PriceUtilities
{
  private $taxrate = 17;
  public function calculateTax(float $price): float
  {
    return (($this->taxrate / 100) * $price);
  }
}

?>