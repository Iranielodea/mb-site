<?php

namespace App\Models;
require_once 'App/Models/PessoaBase.php';

class TransportadoraModel extends PessoaBase
{
    private $cpf_transp;
    private $fone1;
    private $fone2;
    private $ddd;
    private $contato;
    private $numBanco;
    private $nomeBanco;
    private $numAgencia;
    private $numConta;
    private $titular;

    public function getCpfTransp()
    {
        return $this->cpf_transp;
    }

    public function setCpfTrans($value)
    {
        $this->cpf_transp = $value;
    }

    public function getFone1()
    {
        return $this->fone1;
    }

    public function setFone1($value)
    {
        $this->fone1 = $value;
    }

    public function getFone2()
    {
        return $this->fone2;
    }

    public function setFone2($value)
    {
        $this->fone2 = $value;
    }

    public function getDDD()
    {
        return $this->ddd;
    }

    public function setDDD($value)
    {
        $this->ddd = $value;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setContato($value)
    {
        $this->contato = $value;
    }

    public function getNumBanco()
    {
        return $this->numBanco;
    }

    public function setNumBanco($value)
    {
        $this->numBanco = $value;
    }

    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }

    public function setNomeBanco($value)
    {
        $this->nomeBanco = $value;
    }

    public function getNumAgencia()
    {
        return $this->numAgencia;
    }

    public function setNumAgencia($value)
    {
        $this->numAgencia = $value;
    }

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setNumConta($value)
    {
        $this->numConta = $value;
    }

    public function getTitular()
    {
        return $this->titular;
    }

    public function setTitular($value)
    {
        $this->titular = $value;
    }
}