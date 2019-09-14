<?php

namespace phpbox\phpadvanced\inheritance;

abstract class ShopProductWriter
{
  protected $products = [];
  public function addProduct(ShopProduct $shopProduct)
  {
    $this->products[] = $shopProduct;
  }

  abstract public function write();

  public function write2()
  {
    $str =  "";
    foreach ($this->products as $shopProduct) {
      $str .= "{$shopProduct->title}: ";
      $str .= $shopProduct->getProducer();
      $str .= " ({$shopProduct->getPrice()})\n";
    }
    print $str;
  }
}

class TextProductWriter extends ShopProductWriter
{
  public function write()
  {
    $str = "PRODUCTS:\n";
    foreach ($this->products as $shopProduct) {
      $str .= $shopProduct->getSummaryLine() . "\n";
    }
    print $str;
  }
}


?>