<?php

class Statistic
{

  /**
  * Return number of requests in current session
  */
  public static function requestsCounter(){
    if (!isset($_SESSION['requestsCounter']))
    {
      echo "session not set";
      $_SESSION['requestsCounter'] = 0;
    }

    echo  '<br>Requests counter: ' . ++$_SESSION['requestsCounter'];
  }
}