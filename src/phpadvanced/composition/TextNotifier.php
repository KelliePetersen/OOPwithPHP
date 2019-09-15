<?php

namespace phpbox\phpadvanced\composition;

class TextNotifier extends Notifier {
  public function inform($message) {
    print "TEXT notification: {$message}\n";
  }
}

?>