<?php

namespace App\DAO;

use App\DAO\Crud;
use App\Models\ContasFiltroModel;
use PDO;

require_once 'App/DAO/Crud.php';
require_once 'App/Models/ContasFiltroModel.php';

class ContasDAO extends Crud
{
    protected $tabela = "conta";

    // public function getAll($campo, $texto, $tipo)
    public function getAll(ContasFiltroModel $filtro)
    {
        // $tipo 'R = Recber P = Pagar'

        if ($filtro->tipo == "R")
            $recPagar = "1,2";
        else
            $recPagar = "3";

        // $texto = strtoupper($texto);
        $sql = "SELECT id, codigo, documento, data_emissao, data_vencto, valor_pagar, valor_pago, data_pago FROM $this->tabela";
        // $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " WHERE id IS NOT NULL";

        if ($filtro->dataEmissaoInicial != null)
        {
            $sql = $sql . " AND data_emissao >= '{$filtro->dataEmissaoInicial}'";
        }
        if ($filtro->dataEmissaoFinal != null)
        {
            $sql = $sql . " AND data_emissao <= '{$filtro->dataEmissaoFinal}'";
        }

        if ($filtro->dataVencimentoInicial != null)
        {
            $sql = $sql . " AND data_emissao >= '{$filtro->dataVencimentoInicial}'";
        }
        if ($filtro->dataVencimentoFinal != null)
        {
            $sql = $sql . " AND data_emissao <= '{$filtro->dataVencimentoFinal}'";
        }

        if ($filtro->dataPagamentoInicial != null)
        {
            $sql = $sql . " AND data_emissao >= '{$filtro->dataPagamentoInicial}'";
        }
        if ($filtro->dataPagamentoFinal != null)
        {
            $sql = $sql . " AND data_emissao <= '{$filtro->dataPagamentoFinal}'";
        }

        if ($filtro->pessoaId != null)
        {
            if ($filtro->tipo == "R")
                $sql = $sql . " AND cod_cliente = {$filtro->pessoaId}";
            else
                $sql = $sql . " AND cod_for = {$filtro->pessoaId}";
        }
        $sql = $sql . " AND tipo_conta IN ({$recPagar})"; 
        
        if ($filtro->situacao != "T")
        {
            if ($filtro->situacao == "A")
                $sql = $sql . " AND valor_pago <= 0";
            else
                $sql = $sql . " AND valor_pago > 0"; 
        }
        $sql = $sql . " ORDER BY {$filtro->campoOrdem}";

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

    public function obterPorFornecedor($codFornecedor, $tipo)
    {
        if ($tipo == "R")
        $recPagar = "1";
    else
        $recPagar = "2,3";

    // $texto = strtoupper($texto);
    $sql = "SELECT id, codigo, documento, data_emissao, data_vencto, valor_pagar, valor_pago FROM $this->tabela";
    $sql = $sql . " WHERE cod_for = {$codFornecedor}";
    $sql = $sql . " AND tipo_conta in({$recPagar})";
    $sql = $sql . " ORDER BY data_emissao";

    $stmt = DB::prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
    }
}