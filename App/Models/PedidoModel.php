<?php

namespace App\Models;

require_once 'App/Models/Funcoes.php';

use Exception;

class PedidoModel
{
    public $id;
    public $numPedido;
    public $nomeCliente;
    public $data;
    public $totalBruto;
    public $percDesconto;
    public $valorDesconto;
    public $totalLiquido;
    public $situacao;
    public $nomeFornecedor;
    public $obs;
    public $nomeContato;
    public $percComissao;
    public $encerrado;
    public $totalVenda;
    public $totalLucro;
    public $totalQtde;
    public $numCarga;
    public $valorLucro;
    public $nomeVendedor;
    public $valorComissao;
    public $totalComissao;
    public $nomeUsina;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($value)
    {
        
        $this->numPedido = $value;
    }

    public function getData()
    {
        // return $this->data;
        return $this->formatarData($this->data);
    }

    public function setData($value)
    {
        $this->data = $value;
        // try
        // {
        //     $this->data = date("Y-m-d", $value);
        // }
        // catch(Exception $ex)
        // {
        //     $this->data = null;
        // }
    }

    public function getTotalBruto()
    {
        return $this->formatarValor($this->totalBruto, 2);
    }

    public function setTotalBruto($value)
    {
        $this->totalBruto = $value;
    }

    public function getPercDesconto()
    {
        return $this->formatarValor($this->percDesconto, 2);
    }

    public function setPercDesconto($value)
    {
        $this->percDesconto = $value;
    }

    public function getValorDesconto()
    {
        return $this->formatarValor($this->valorDesconto, 2);
    }

    public function setValorDesconto($value)
    {
        $this->valorDesconto = $value;
    }

    public function getTotalLiquido()
    {
        return $this->formatarValor($this->totalLiquido, 2);
    }

    public function setTotalLiquido($value)
    {
        $this->totalLiquido = $value;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($value)
    {
        $this->situacao = $value;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($value)
    {
        $this->nomeFornecedor = $value;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($value)
    {
        $this->nomeCliente = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getNomeContato()
    {
        return $this->nomeContato;
    }

    public function setNomeContato($value)
    {
        $this->nomeContato = $value;
    }

    public function getPercComissao()
    {
        return $this->formatarValor($this->percComissao, 4);
    }

    public function setPercComissao($value)
    {
        $this->percComissao = $value;
    }

    public function getEncerrado()
    {
        return $this->encerrado;
    }

    public function setEncerrado($value)
    {
        $this->encerrado = $value;
    }

    public function getTotalVenda()
    {
        return $this->formatarValor($this->totalVenda, 2);
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }

    public function getTotalLucro()
    {
        return $this->formatarValor($this->totalLucro, 2);
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalQtde()
    {
        return $this->formatarValor($this->totalQtde, 3);
    }

    public function setTotalQtde($value)
    {
        $this->totalQtde = $value;
    }

    public function getNumCarga()
    {
        return $this->numCarga;
    }

    public function setNumCarga($value)
    {
        $this->numCarga = $value;
    }

    public function getValorLucro()
    {
        return $this->formatarValor($this->valorLucro, 2);
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getNomeVendedor()
    {
        return $this->nomeVendedor;
    }

    public function setNomeVendedor($value)
    {
        $this->nomeVendedor = $value;
    }
    
    public function getValorComissao()
    {
        return $this->formatarValor($this->valorComissao, 4);
    }

    public function setValorComissao($value)
    {
        $this->valorComissao = $value;
    }

    public function getTotalComissao()
    {
        return $this->formatarValor($this->totalComissao, 2);
    }

    public function setTotalComissao($value)
    {
        $this->totalComissao = $value;
    }

    public function getNomeUsina()
    {
        return $this->nomeUsina;
    }

    public function setNomeUsina($value)
    {
        $this->nomeUsina = $value;
    }

    private function formatarData($data)
    {
        return Funcoes::formatarData($data);
    }

    private function formatarValor($valor, $casas)
    {
        return Funcoes::formatarValor($valor, $casas);
    }
}