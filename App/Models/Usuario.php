<?php

namespace App\Models;
use PDO;

class Usuario{
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function cadastro(array $dados){

        if(($this->verificaExiste($dados['email'], $dados['telefone'])) === false){
            
                
            $query = "INSERT INTO usuarios(nome, telefone, email, senha) values(:nome, :telefone, :email, :senha)";
            $conn = $this->db;
            $stmt = $conn->prepare($query);

            $stmt->bindValue(':nome', trim($dados['nome'])); 
            $stmt->bindValue(':telefone', trim(preg_replace('/[^0-9]/', '', $dados['telefone']))); 
            $stmt->bindValue(':email', trim($dados['email'])); 
            $stmt->bindValue(':senha',  password_hash(trim($dados['senha']), PASSWORD_DEFAULT)); 

            if($stmt->execute()){
                return true;
            } 
        }else{
            return 'existe';   
        }

    }

    public function verificaExiste(String $email, String $telefone){

        $query = "SELECT id from usuarios where email = :email or telefone = :telefone";
        $conn = $this->db;
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email', trim($email)); 
        $stmt->bindValue(':telefone', trim($telefone));

        if($stmt->execute() && $stmt->rowCount()){
            return true;
        }

        return false;
    }

    public function cadastroEndereco(array $dados){

        $query = "INSERT INTO enderecos(estado, bairro, logradouro, numero, cidade, fk_usuario) values(:estado, :bairro, :logradouro, :numero, :cidade, :fk_usuario)";
        $conn = $this->db;
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':estado', trim($dados['estado'])); 
        $stmt->bindValue(':bairro', trim($dados['bairro'])); 
        $stmt->bindValue(':logradouro', trim($dados['logradouro'])); 
        $stmt->bindValue(':numero', trim($dados['numero'])); 
        $stmt->bindValue(':cidade', trim($dados['cidade'])); 
        $stmt->bindValue(':fk_usuario', trim($_SESSION['user']['id'])); 

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
       
    }
    public function alteraEndereco(array $dados){

        $query = "UPDATE enderecos SET estado = :estado, bairro = :bairro, logradouro = :logradouro, numero = :numero, cidade = :cidade, raio = :raio where id =:id and fk_usuario = :fk_usuario";
        $conn = $this->db;
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':estado', trim($dados['estado'])); 
        $stmt->bindValue(':bairro', trim($dados['bairro'])); 
        $stmt->bindValue(':logradouro', trim($dados['logradouro'])); 
        $stmt->bindValue(':numero', trim($dados['numero'])); 
        $stmt->bindValue(':cidade', trim($dados['cidade'])); 
        $stmt->bindValue(':raio', trim($dados['raio'])); 
        $stmt->bindValue(':fk_usuario', trim($_SESSION['user']['id'])); 
        $stmt->bindValue(':id', trim($dados['id'])); 

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
       
    }
    
    public function removeEndereco(array $dados){
        
        $query = "DELETE FROM enderecos where fk_usuario = :fk_usuario and id = :id";
        $conn = $this->db;
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_usuario', trim($_SESSION['user']['id'])); 
        $stmt->bindValue(':id', trim($dados['id'])); 

        if($stmt->execute() && $stmt->rowCount()){
            return true;
        }

        return false;
    }
    

}

?>