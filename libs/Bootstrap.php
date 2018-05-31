<?php
session_start();
/**
 *
 */
class Bootstrap
{

  function __construct()
  {
    echo 'REQUEST_URI: ' . $_SERVER['REQUEST_URI'] . '<br>';
    $this->requestsCounter();
  }

  private function requestsCounter()
  {
    if (!isset($_SESSION['requestsCounter']))
    {
      echo "session not set";
      $_SESSION['requestsCounter'] = 0;
    }

    echo  '<br>Requests counter: ' . ++$_SESSION['requestsCounter'];
  }

}
