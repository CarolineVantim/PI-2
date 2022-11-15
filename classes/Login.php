<?php
require_once './banco/Database.php';

class Login extends Database{

    public $email;
    public $senha;
        
      
    public function getLoginAluno($email, $senha){
        
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');

        if(is_null($email) or is_null($senha)){
            return false;
        }

        $db = new Database('aluno');
        return $db->select("email = '$email'");

        if(!$db){
            return false;
        }

        if (password_verify($senha, $db['senha'])){
            unset($db['senha']);
            $_SESSION['auth'] = $db;
            return true;
        }
        return false;

    }

    public function getProfessor($email){
        return (new Database('professor'))->select("email = '$email'");
    }

    public function getEmpresa($email){
        return (new Database('empresa'))->select("email = '$email'");
    }
}
?>