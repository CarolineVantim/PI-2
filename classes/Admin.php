<?php

require_once '../banco/Database.php';

class Admin{

    public $ra;
    public $email;
    public $senha;
    public $nome;
    public $dataNasc;
    
    public function Cadastrar() {
        $db = new Database('administrativo');
        return $db->insert([
                            'email'=> "'$this->email'",
                            'senha'=> "'$this->senha'",
                            'nome'=> "'$this->nome'",
                            'dataNasc'=> "'$this->dataNasc'"
                            ]);
    }
        

    public static function getAdministrativo(){
        return (new Database('administrativo'))->select();
    }
    
}
    