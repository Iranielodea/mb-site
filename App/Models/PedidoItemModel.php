<?php

namespace App\Models;

require_once 'App/Models/Funcoes.php';

class PedidoItemModel
{
    private $id;
    private $numPedido;
    private $codProduto;
    private $nomeProduto;
    private $seq;
    private $siglaUn;
    private $qtde;
    private $valor;
    private $valorTotal;
    private $precoVenda;
    private $valorLucro;
    private $totalLucro;
    private $totalVenda;

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

    public function getCodProduto()
    {
        return $this->codProduto;
    }

    public function setCodProduto($value)
    {
        $this->codproduto = $value;
    }

    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    public function setNomeProduto($value)
    {
        $this->nomeProduto = $value;
    }

    public function getSeq()
    {
        return $this->seq;
    }

    public function setSeq($value)
    {
        $this->seq = $value;
    }

    public function getSiglaUn()
    {
        return $this->siglaUn;
    }

    public function setSiglaUn($value)
    {
        $this->siglaUn = $value;
    }

    public function getQtde()
    {
        return $this->formatarValor($this->qtde, 0);
    }

    public function setQtde($value)
    {
        $this->qtde = $value;
    }

    public function getValor()
    {
        return $this->formatarValor($this->valor, 4);
    }

    public function setValor($value)
    {
        $this->valor = $value;
    }

    public function getValorTotal()
    {
        return $this->formatarValor($this->valorTotal, 2);
    }

    public function setValorTotal($value)
    {
        $this->valorTotal = $value;
    }

    public function getPrecoVenda()
    {
        return $this->formatarValor($this->precoVenda, 4);
    }

    public function setPrecoVenda($value)
    {
        $this->precoVenda = $value;
    }

    public function getValorLucro()
    {
        return $this->formatarValor($this->valorLucro, 2);
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getTotalLucro()
    {
        return $this->formatarValor($this->totalLucro, 2);
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalVenda()
    {
        return $this->formatarValor($this->totalVenda, 2);
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }

    private function formatarValor($valor, $casas)
    {
        return Funcoes::formatarValor($valor, $casas);
    }
}