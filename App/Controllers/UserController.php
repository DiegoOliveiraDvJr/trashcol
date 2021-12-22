<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;
    use MF\Model\Container; 
    use  App\Connection;
    use App\Models\Usuario;
    use PDO; 

    class UserController extends Action{

        public function index(){
            
            $this->render('index');
        }
        
        public function registrarUser(){  

           if(isset($_POST) && !empty($_POST)) {
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => $_POST['senha'],
                    'telefone' => $_POST['telefone']
                ];

                $usuario = new Usuario(Connection::getDb());

                $retorno = $usuario->cadastro($data);

                if($retorno === true){
                    echo 'ok';
                }else if($retorno === 'existe'){
                    echo 'existe';
                }else{
                    echo 'falhou';
                }
            }else{
                $return = ['status' => 'error'];
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($return);
            }
            
        }

        public function enderecos(){
            require_once "../App/verif_auth.php";

            $query = "SELECT * from enderecos where fk_usuario = :fk_usuario";
            $conn = Connection::getDb();
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':fk_usuario', trim($_SESSION['user']['id'])); 
            $stmt->execute();

            $this->view->enderecos = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            $this->render('enderecos', 'layout-2');
        }
        public function conta(){
            require_once "../App/verif_auth.php";
            
            $this->render('conta', 'layout-2');
        }

        public function cadastroEnderco(){

            require_once "../App/verif_auth.php";

            $usuario = new Usuario(Connection::getDb());

            $data = $_POST;
            $retorno = $usuario->cadastroEndereco($data);

            if($retorno === true){
                echo 'ok';
            }else{
                echo 'falhou';
            }
        }
        public function removeEndereco(){

            require_once "../App/verif_auth.php";

            $usuario = new Usuario(Connection::getDb());

            $data = $_POST;
           
            $retorno = $usuario->removeEndereco($data);

            if($retorno === true){
                echo 'ok';
            }else{
                echo 'falhou';
            }
        }

        public function alteraEndereco(){

            require_once "../App/verif_auth.php";

            $usuario = new Usuario(Connection::getDb());

            $data = $_POST;
           
            $retorno = $usuario->alteraEndereco($data);

            if($retorno === true){
                echo 'ok';
            }else{
                echo 'falhou';
            }
        }
        
        
        public function politica(){
            
            $this->render('politica-de-privacidade', 'layout');
        }
        
    }

?>