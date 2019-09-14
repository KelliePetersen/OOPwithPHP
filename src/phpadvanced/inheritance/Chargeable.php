<?php

namespace phpbox\phpadvanced\inheritance;

/* 
Although abstract classes let you provide some measure of implementation, interfaces are pure templates. 
An interface can only define functionality; it can never implement it. An interface is declared with the 
interface keyword. It can contain properties and method declarations but not method bodies.

Any class that incorporates this interface commits to implementing all the methods it defines, or it must be declared
abstract. A class can implement an interface using the implements keyword in its declaration. Once you have 
done this, the process of implementing an interface is the same as extending an abstract class that contains 
only abstract methods.

A class can both extend a superclass and implement multiple interfaces:
class Consultancy extends TimedService implements Bookable, Chargeable {}
*/

interface Chargeable
{
  public function getPrice(): float;
}

?>