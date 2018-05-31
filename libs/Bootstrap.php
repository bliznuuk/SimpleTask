<?php

session_start();

class Bootstrap
{

  function __construct()
  {
    $url = $this->getUrlFromRequest($_SERVER['REQUEST_URI']);
    

    require_once 'Statistic.php';
    Statistic::requestsCounter();
  }

  private function getUrlFromRequest($request_uri){
    echo 'REQUEST_URI: ' . $request_uri . '<br>';
    
    if (!isset($request_uri)){
      return false;
    }
    
    $url = explode('/', rtrim($request_uri,'/'));
    
    print_r($url);
    
    return $url;
  }
}
