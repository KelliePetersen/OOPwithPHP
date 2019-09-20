<?php

namespace phpbox\phpadvanced\service_locator;

class AppConfig
{
  private static $instance;
  private $commsManager;

  private function __construct()
  {
    // will run once only
    $this->init();
  }
  
  private function init()
  {
    switch (Settings::$COMMSTYPE) {
      case 'Mega':
        $this->commsManager = new MegaCommsManager();
        break;
      default:
        $this->commsManager = new BloggsCommsManager();
    }
  }
  public static function getInstance(): AppConfig
  {
    if (empty(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  public function getCommsManager(): CommsManager
  {
    return $this->commsManager;
  }
}

?>