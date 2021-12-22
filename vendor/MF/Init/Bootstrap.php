<?php
    namespace MF\Init;

    abstract class Bootstrap{
        private $routes;

        abstract protected function initRoutes();

        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }
        public function getRoutes(){
         return $this->routes;
        }
        public function setRoute(array $routes){
            $this->routes = $routes;
        }
        protected function run($url){
            foreach ($this->getRoutes() as $key => $route) {
    
                if($url == $route['route']){
                    $class = "App\\Controllers\\".ucfirst($route['controller']);// mesma coisa de  App\Controllers\IndexController
    
                    $controller = new $class;
                    $action = $route['action'];
                    $controller->$action();
                }
            }
        }
        protected function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }
    


?>