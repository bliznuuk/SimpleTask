<?php

session_start();

class Bootstrap
{

  function __construct()
  {
    echo 'REQUEST_URI: ' . $_SERVER['REQUEST_URI'] . '<br>';

    require_once 'Statistic.php';
    Statistic::requestsCounter();
  }

}
