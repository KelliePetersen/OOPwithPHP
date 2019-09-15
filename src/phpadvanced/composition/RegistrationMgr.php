<?php

namespace phpbox\phpadvanced\composition;

class RegistrationMgr
{
  public function register(Lesson $lesson) {
    // do something with this Lesson
    // now tell someone
    $notifier = Notifier::getNotifier();
    $notifier->inform("new lesson: cost ({$lesson->cost()})");
  }
}

?>