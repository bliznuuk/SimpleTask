<?php

session_start();

class Bootstrap
{

  function __construct()
  {
    $url = $this->getUrlFromRequest($_SERVER['REQUEST_URI']);
    require_once 'controllers/Controller.php';
    
    $this->chooseController($url);

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
  
  function chooseController($url) {
      if (count($url) == 1){
          require_once 'controllers/Index.php';
          return;
      }
      
      $controllerName = ucfirst($url[1]);
      if(!file_exists('controllers/'.$controllerName.'.php')){
          return;
      }
      
      require_once 'controllers/'.$controllerName.'.php';
      $controller = new $controllerName();
      
      if(isset($url[2])){
        $action = $url[2];
        if(isset($url[3])){
            $param = $url[3];
            $controller->{$action}($param);
        }
        else{
            $controller->{$action}();
        }
      }
      
      echo $controllerName . '  |  ' . $action;
      
      
  }
}
