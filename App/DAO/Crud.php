<?php

namespace App\DAO;

use PDO;

require_once 'App/DAO/DB.php';

abstract class Crud extends DB{
    protected $tabela;

    public function find($id){
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function obterPorCodigo($codigo){
        $sql = "SELECT * FROM $this->tabela WHERE codigo = :codigo";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deletarPorCodigo($codigo){
        $sql = "DELETE FROM $this->tabela WHERE codigo = :codigo";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletarPorId($id){
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}