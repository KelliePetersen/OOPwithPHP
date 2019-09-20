<?php

namespace phpbox\phpadvanced\abstract_factory;

abstract class CommsManager
{
  const APPT = 1;
  const TTD = 2;
  const CONTACT = 3;
  abstract public function getHeaderText(): string;
  abstract public function make(int $flag_int): Encoder;
  abstract public function getFooterText(): string;
}

?>