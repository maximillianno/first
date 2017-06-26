<?php
/**
 * Created by PhpStorm.
 * User: maxus
 * Date: 26.06.2017
 * Time: 8:27
 */
class Router{
     private $routes;

     function __construct()
     {
         $this->routes = include ROOT.'/config/routes.php';
     }
     private function getURI(){
         return trim($_SERVER['REQUEST_URI'],'/');
     }

     public function Run(){
         //include ROOT.'/views/site/index.php';
         $uri = $this->getURI();
         foreach ($this->routes as $uriPattern => $path) {
             if (preg_match("~$uriPattern~", $path)){
                 $internalRoute = preg_replace("~$uriPattern~", $uri, $path);
                 $segments = explode('/', $internalRoute);
                 $controllerName = array_shift($segments).'Controller';
                 $controllerName = ucfirst($controllerName);
                 $actionName = 'action'.ucfirst(array_shift($segments));
                 $parameters = $segments;
                 $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                 if (file_exists($controllerFile)){
                     include_once $controllerFile;
                 }

                 echo $controllerName. ' '. $actionName .' '. $controllerFile;

                 $controllerObject = new $controllerName;
                 $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                 if ($result != null) break;
             }
         }

     }
}