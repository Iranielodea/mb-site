<?php

namespace App\DAO;

require_once 'App/DAO/Crud.php';

class FornecedorDAO extends Crud
{
    protected $tabela = "fornecedor";

    public function getAll($campo, $texto)
    {
        $texto = strtoupper($texto);
        $sql = "SELECT id, codigo, nome, cnpj, ie, fone, email FROM $this->tabela";
        $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " ORDER BY {$campo}";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}