<?php

namespace App\DAO;

use App\DAO\Crud;

require_once 'App/DAO/Crud.php';

class ContaBancoDAO extends Crud
{
    protected $tabela = "conta_banco";

    public function getAll($campo, $texto)
    {
        $texto = strtoupper($texto);
        $sql = "SELECT id, codigo, num_conta, agencia, nome_banco, cnpj_cpf FROM $this->tabela";
        $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " ORDER BY {$campo}";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}