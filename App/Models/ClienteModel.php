<?php

namespace App\Models;
require_once 'App/Models/PessoaBase.php';

class ClienteModel extends PessoaBase
{
    private $complemento;
    private $cpf;
    private $dataCadastro;
    private $fantasia;
    private $fone;
    private $numero;
    private $rg;
    private $tipoPessoa;

    public function setComplemento($value)
    {
        $this->complemento = $value;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setCpf($value)
    {
        $this->cpf = $value;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setDataCadastro($value)
    {
        $this->dataCadastro = $value;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setFantasia($value)
    {
        $this->fantasia = $value;
    }

    public function getFantasia()
    {
        return $this->fantasia;
    }

    public function setFone($value)
    {
        $this->fone = $value;
    }

    public function getFone()
    {
        return $this->fone;
    }

    public function setNumero($value)
    {
        $this->numero = $value;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setRg($value)
    {
        $this->rg = $value;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setTipoPessoa($value)
    {
        $this->tipoPessoa = $value;
    }

    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }
}