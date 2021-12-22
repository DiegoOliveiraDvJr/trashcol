<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;  

    class IndexController extends Action{

        public function index(){
            require_once "../App/verif_auth.php";
            $this->render('index', 'layout-2');
        }
        public function sobre(){
            require_once "../App/verif_auth.php";
            $this->render('sobre', 'layout-2');
        }
        
        public function logout(){
            require_once "../App/verif_auth.php";
            unset($_SESSION['user']);
            header('Location: /login');
        }
    }

?>