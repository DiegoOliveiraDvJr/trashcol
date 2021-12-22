<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container; 
    use  App\Connection; 
    use  PDO;

    class LoginController extends Action{

        public function index(){

            if(isset($_POST, $_POST['email'], $_POST['senha'])){
                $conn = Connection::getDb();
                $query = "SELECT * FROM usuarios where email = :email";
                $stmt = $conn->prepare($query);
                $stmt->bindValue(":email", filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
                $stmt->execute();
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);

                if(!empty($usuario) && $stmt->rowCount()){
                    if(password_verify($_POST['senha'], $usuario->senha)){
                        session_start();
                        $_SESSION['user'] = [
                            'id' => $usuario->id,
                            'nome' => $usuario->nome,
                            'email' => $usuario->email ,
                            'autenticado' => true
                        ];
                        echo 'ok';
                    }else{
                        echo 'si';
                    }
                }else{
                    echo 'ne';
                }

            }else{
                $this->render('index');
            }
            
            
        }
        
    }

?>