<?php

namespace App\Models;

require_once 'App/Models/BaseModel.php';

class PessoaBase extends BaseModel
{
    private $bairro;
    private $cep;
    private $cnpj;
    private $email;
    private $endereco;
    private $fax;
    private $insc_estadual;
    private $nome_cidade;
    private $obs;
    private $uf;

    public function setBairro($value)
    {
        $this->bairro = $value;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setCep($value)
    {
        $this->cep = $value;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($value)
    {
        $this->uf = $value;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCnpj($value)
    {
        $this->cnpj = $value;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEndereco($value)
    {
        $this->endereco = $value;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setFax($value)
    {
        $this->fax = $value;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setInscricaoEstadual($value)
    {
        $this->insc_estadual = $value;
    }

    public function getInscricaoEstadual()
    {
        return $this->insc_estadual;
    }

    public function setNomeCidade($value)
    {
        $this->nome_cidade = $value;
    }

    public function getNomeCidade()
    {
        return $this->nome_cidade;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }
}