<?php

namespace App\DAO;

use App\DAO\Crud;
use PDO;

require_once 'App/DAO/Crud.php';

class ContasDAO extends Crud
{
    protected $tabela = "conta";

    public function getAll($campo, $texto, $tipo)
    {
        // $tipo 'R = Recber P = Pagar'

        if ($tipo == "R")
            $recPagar = 1;
        else
            $recPagar = 2;

        $texto = strtoupper($texto);
        $sql = "SELECT id, codigo, documento, data_emissao, data_vencto, valor_pagar, valor_pago FROM $this->tabela";
        $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " AND tipo_conta = {$recPagar}";
        $sql = $sql . " ORDER BY {$campo}";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obterPorId($id){
        $sql = "SELECT con.*, ban.num_conta FROM conta con ";
        $sql = $sql ."LEFT JOIN conta_banco ban on con.conta_banco_id = ban.codigo ";
        $sql = $sql ." WHERE con.id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}