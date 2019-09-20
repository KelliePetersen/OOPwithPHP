<?php

namespace phpbox\phpadvanced\abstract_factory;

class BloggsApptEncoder extends ApptEncoder {
  public function encode(): string {
    return "Appointment data encoded in BloggsCal format\n";
  }
}

?>