<?php

namespace phpbox\phpadvanced\inheritance;

class BookProduct extends ShopProduct
{
  public $numPages;

  public function __construct(
    string $title,
    string $firstName,
    string $mainName,
    float $price,
    int $numPages
  ) {
    parent::__construct(
      $title,
      $firstName,
      $mainName,
      $price
    );
    $this->numPages = $numPages;
  }

  public function getNumberOfPages()
  {
    return $this->numPages;
  }

  public function getSummaryLine()
  {
    $base  = parent::getSummaryLine();
    $base .= ": page count - {$this->numPages}";
    return $base;
  }
}

?>