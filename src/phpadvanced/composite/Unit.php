<?php

namespace phpbox\phpadvanced\composite;

/*
The client must check to see whether it has a CompositeUnit before it can use addUnit().
This is where the getComposite() method comes into its own. By default, this method returns a null
value. Only in a CompositeUnit class does it return CompositeUnit. So if a call to this method returns an
object, we should be able to call addUnit() on it. 
*/
abstract class Unit
{
  public function getComposite()
  {
    return null;
  }
  abstract public function bombardStrength(): int;
}

?>