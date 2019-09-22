<?php

namespace phpbox\phpadvanced\SOLID;
require __DIR__ . "/../../../vendor/autoload.php";

/* 
WRONG METHOD 
If you wish to add an attribute, you have to add code lines and parameters in several places.
A well written class should NOT have to be rewritten to integrate a new feature. 
*/

class OrderReportBAD {
  public $customer;
  public $total;
  public $address;

  public function __construct($customer, $total, $address) {
    $this->customer = $customer;
    $this->total = $total;
    $this->address = $address;
  }

  public function invoice() {
    return "Invoice for {$this->customer}\nTotal Cost: {$this->total}\nShipping Address: {$this->address}\n";
  }

  public function bill_of_lading() {
    return "BOL {$this->customer}\nShipping Label: {$this->address}\n";
  }
}

$order = new OrderReportBAD("Google", 100, "12 park street");
print $order->invoice();
print $order->bill_of_lading();
print "\n";



/* 
CORRECT METHOD
The above functions are now their own classes that inherit from the OrderReport class. 
When changes are to be made to Invoice/BOL, the OrderReport class doesn't need to be touched. 
This means that the parent class is closed. This structure also follows the Single Responsibility principle.
*/

class OrderReport {
  public $customer;
  public $total;
  public function __construct($customer, $total) {
    $this->customer = $customer;
    $this->total = $total;
  }
}

class Invoice extends OrderReport {
  public function print() {
    return "Invoice for {$this->customer}\nTotal Cost: {$this->total}\n";
  }
}

class BillOfLading extends OrderReport {
  public $customer;
  public $address;
  public function __construct($customer, $address) {
    $this->customer = $customer;
    $this->address = $address;
  }
  public function print() {
    return "BOL {$this->customer}\nShipping Label: {$this->address}\n";
  }
}

$invoice = new Invoice("Bob", 200);
$billOfLading = new BillOfLading("Bob", "24 fake street");
print $invoice->print();
print $billOfLading->print();
?>