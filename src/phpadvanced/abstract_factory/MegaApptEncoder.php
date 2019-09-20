<?php

namespace phpbox\phpadvanced\abstract_factory;

class MegaApptEncoder extends ApptEncoder {
  public function encode(): string {
    return "Appointment data encoded in MegaCal format\n";
  }
}

?>