<?php

use Controllers\Router;
use Controllers\RouterApi;

require 'vendor/autoload.php';

$uri = explode('/',$_SERVER['REQUEST_URI']);
if ($uri[1]=== 'api') {
      $routerApi = new RouterApi('Controllers');
      $routerApi  ->get('/api/test','Test@get','test')
                  ->run();
}else{
      $router = new Router('Views/template');
      $router->get('/','/HomePage','HomePage')
            ->get('','/HomePage')
            ->get('/cours','/cours','listCours')
            ->run();
}
?>
