<?php
    namespace App;
    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
       
        protected function initRoutes(){

            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'    
            );
            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'loginController',
                'action' => 'index'    
            );
            $routes['registrar'] = array(
                'route' => '/registrar',
                'controller' => 'userController',
                'action' => 'index'    
            );
            $routes['userRegistrar'] = array(
                'route' => '/user/registrar',
                'controller' => 'userController',
                'action' => 'registrarUser'    
            );
            $routes['userVerificaEmail'] = array(
                'route' => '/user/verifica-email',
                'controller' => 'userController',
                'action' => 'verificaEmail'    
            );
            $routes['enderecos'] = array(
                'route' => '/enderecos',
                'controller' => 'userController',
                'action' => 'enderecos'    
            );
            $routes['conta'] = array(
                'route' => '/conta',
                'controller' => 'userController',
                'action' => 'conta'    
            );
            $routes['politica'] = array(
                'route' => '/politica-de-privacidade',
                'controller' => 'userController',
                'action' => 'politica'    
            );
            $routes['sobre'] = array(
                'route' => '/sobre',
                'controller' => 'indexController',
                'action' => 'sobre'    
            );
            $routes['cadastroEnderco'] = array(
                'route' => '/user/endereco',
                'controller' => 'userController',
                'action' => 'cadastroEnderco'    
            );
            $routes['removeEndereco'] = array(
                'route' => '/user/endereco-remove',
                'controller' => 'userController',
                'action' => 'removeEndereco'    
            );
            $routes['alteraEndereco'] = array(
                'route' => '/user/endereco-altera',
                'controller' => 'userController',
                'action' => 'alteraEndereco'    
            );
            $routes['logout'] = array(
                'route' => '/logout',
                'controller' => 'indexController',
                'action' => 'logout'    
            );
            
           
            $this->setRoute($routes);
       } 

    }
?>