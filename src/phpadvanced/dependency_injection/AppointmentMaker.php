<?php

namespace phpbox\phpadvanced\dependency_injection;

// BAD WAY
// class AppointmentMaker
// {
//   public function makeAppointment()
//   {
//     $encoder = new BloggsApptEncoder();
//     return $encoder->encode();
//   }
// }

class AppointmentMaker {
  private $encoder;
  public function __construct(ApptEncoder $encoder) {
    $this->encoder = $encoder;
  }
  public function makeAppointment() {
    return $this->encoder->encode();
  }
}

?>