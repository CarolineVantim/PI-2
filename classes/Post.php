<?php

require_once './banco/Database.php';

class Post
{

    public $IdPost;
    public $titulo;
    public $dataPost;
    public $corpo;
    public $anexo;
    public $idProfessor;
    public $IdAdministrativo;
    public $idEmpresa;

    public function Cadastrar()
    {
        $db = new Database('posts');
        $data = [
            'titulo'=> "'$this->titulo'",
            //'dataPost'=> "'$this->dataPost'", retirei
            'corpo'=> "'$this->corpo'",
            'anexo'=> "'$this->anexo'",
        ];

        if (!empty($this->idProfessor)) {
            $data['idProfessor'] = $this->idProfessor;
        }
        if (!empty($this->idEmpresa)) {
            $data['idEmpresa'] = $this->idEmpresa;
        }
        if (!empty($this->IdAdministrativo)) {
            $data['IdAdministrativo'] = $this->IdAdministrativo;
        }
        return $db->insert($data);
    }

    public static function getPost(){
        return (new Database('posts'))->select();
    }

}