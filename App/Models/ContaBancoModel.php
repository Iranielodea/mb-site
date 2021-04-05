<?php

namespace App\Models;

class ContaBancoModel
{
    private $id;
    private $codigo;
    private $numConta;
    private $agencia;
    private $banco;
    private $ativo;
    private $cnpjCpf;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setNumConta($numConta)
    {
        $this->numConta = $numConta;
    }

    public function getAgencia()
    {
        return $this->agencia;
    }

    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    public function getBanco()
    {
        return $this->banco;
    }

    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    public function setCnpjCpf($cnpjCpf)
    {
        $this->cnpjCpf = $cnpjCpf;
    }
}