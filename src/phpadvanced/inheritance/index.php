<?php

namespace phpbox\phpadvanced\inheritance;
require __DIR__."/../../../vendor/autoload.php";

/* 
Each child class invokes the constructor of its parent before setting its own properties. The base class 
now knows only about its own data. Child classes are generally specializations of their parents. As a rule of 
thumb, you should avoid giving parent classes any special knowledge about their children.
*/

$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
$product2 = new CdProduct(
  "Exile on Coldharbour Lane",
  "The",
  "Alabama 3",
  10.99,
  0,
  60.33
);

print ShopProduct::AVAILABLE . "\n";
print "author: {$product1->getProducer()} \n";
print "artist: {$product2->getProducer()} \n";
$p = new ShopProduct();
print $p->calculateTax(100) . "\n";

?>