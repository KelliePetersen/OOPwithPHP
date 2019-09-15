<?php

namespace phpbox\phpadvanced\composition;

class MailNotifier extends Notifier {
  public function inform($message) {
    print "MAIL notification: {$message}\n";
  }
}

?>