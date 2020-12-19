<?php

namespace App\Models;

final class UsuarioModel
{
    private $id;
    private $username;
    private $senha;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUserName(){
        return $this->username;
    }

    public function setUserName($userName){
        $this->username = $userName;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
}