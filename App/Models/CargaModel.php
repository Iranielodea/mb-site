<?php

namespace App\Models;

require_once 'App/Models/Funcoes.php';

class CargaModel
{
    private $id;
    private $codigo;
    private $agenciaBanco;
    private $armazen;
    private $cnpjCpf;
    private $codCliente;
    private $codContato;
    private $codFornecedor;
    private $codManifesto;
    private $codMotorista;
    private $codUsina;
    private $complemento;
    private $complUnidade;
    private $contatoIndicacao;
    private $creditoNf;
    private $data;
    private $dataNf;
    private $financeiro;
    private $idContaBanco;
    private $idUnidade;
    private $ir;
    private $letra;
    private $nomeAgencia;
    private $nomeCliente;
    private $nomeContato;
    private $nomeFornecedor;
    private $nomeManifesto;
    private $nomeMotorista;
    private $nomeUsina;
    private $numCarga;
    private $numNf;
    private $numNota2;
    private $numPedido;
    private $obs;
    private $obs2;
    private $placa;
    private $qtde;
    private $qtdeCada;
    private $qtdePedido;
    private $saldo;
    private $siglaUnidade;
    private $situacao;
    private $unidade;
    private $valorCarrega;
    private $valorFrete;
    private $valorNota2;
    private $valorPedido;
    private $visto;

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

    public function getAgenciaBanco()
    {
        return $this->agenciaBanco;
    }

    public function setAgenciaBanco($agenciaBanco)
    {
        $this->agenciaBanco = $agenciaBanco;
    }

    public function getArmazen()
    {
        return $this->armazen;
    }

    public function setArmazen($armazen)
    {
        $this->armazen = $armazen;
    }

    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    public function setCnpjCpf($cnpjCpf)
    {
        $this->cnpjCpf = $cnpjCpf;
    }

    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }

    public function getCodContato()
    {
        return $this->codContato;
    }

    public function setCodContato($codContato)
    {
        $this->codContato = $codContato;
    }

    public function getCodFornecedor()
    {
        return $this->codFornecedor;
    }

    public function setCodFornecedor($codFornecedor)
    {
        $this->codFornecedor = $codFornecedor;
    }

    public function getCodManifesto()
    {
        return $this->codManifesto;
    }

    public function setCodManifesto($codManifesto)
    {
        $this->codManifesto = $codManifesto;
    }

    public function getCodMotorista()
    {
        return $this->codMotorista;
    }

    public function setCodMotorista($codMotorista)
    {
        $this->codMotorista = $codMotorista;
    }

    public function getCodUsina()
    {
        return $this->codUsina;
    }

    public function setCodUsina($codUsina)
    {
        $this->codUsina = $codUsina;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getComplUnidade()
    {
        return $this->complUnidade;
    }

    public function setComplUnidade($complUnidade)
    {
        $this->complUnidade = $complUnidade;
    }

    public function getContatoIndicacao()
    {
        return $this->contatoIndicacao;
    }

    public function setContatoIndicacao($contatoIndicacao)
    {
        $this->contatoIndicacao = $contatoIndicacao;
    }

    public function getCreditoNf()
    {
        return $this->creditoNf;
    }

    public function setCreditoNf($creditoNf)
    {
        $this->creditoNf = $creditoNf;
    }

    public function getData()
    {
        return date('d/m/Y', strtotime($this->data));
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getDataNf()
    {
        return $this->formatarData($this->dataNf);
    }

    public function setDataNf($dataNf)
    {
        $this->dataNf = $dataNf;
    }

    public function getFinanceiro()
    {
        return $this->financeiro;
    }

    public function setFinanceiro($financeiro)
    {
        $this->financeiro = $financeiro;
    }

    public function getIdContaBanco()
    {
        return $this->idContaBanco;
    }

    public function setIdContaBanco($idContaBanco)
    {
        $this->idContaBanco = $idContaBanco;
    }

    public function getIdUnidade()
    {
        return $this->idUnidade;
    }

    public function setIdUnidade($idUnidade)
    {
        $this->idUnidade = $idUnidade;
    }

    public function getIr()
    {
        return $this->ir;
    }

    public function setIr($ir)
    {
        $this->ir = $ir;
    }

    public function getLetra()
    {
        return $this->letra;
    }

    public function setLetra($letra)
    {
        $this->letra = $letra;
    }

    public function getNomeAgencia()
    {
        return $this->nomeAgencia;
    }

    public function setNomeAgencia($nomeAgencia)
    {
        $this->nomeAgencia = $nomeAgencia;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;
    }

    public function getNomeContato()
    {
        return $this->nomeContato;
    }

    public function setNomeContato($nomeContato)
    {
        $this->nomeContato = $nomeContato;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($nomeFornecedor)
    {
        $this->nomeFornecedor = $nomeFornecedor;
    }

    public function getNomeManifesto()
    {
        return $this->nomeManifesto;
    }

    public function setNomeManifesto($nomeManifesto)
    {
        $this->nomeManifesto = $nomeManifesto;
    }

    public function getNomeMotorista()
    {
        return $this->nomeMotorista;
    }

    public function setNomeMotorista($nomeMotorista)
    {
        $this->nomeMotorista = $nomeMotorista;
    }

    public function getNomeUsina()
    {
        return $this->nomeUsina;
    }

    public function setNomeUsina($nomeUsina)
    {
        $this->nomeUsina = $nomeUsina;
    }

    public function getNumCarga()
    {
        return $this->numCarga;
    }

    public function setNumCarga($numCarga)
    {
        $this->numCarga = $numCarga;
    }

    public function getNumNf()
    {
        return $this->numNf;
    }

    public function setNumNf($numNf)
    {
        $this->numNf = $numNf;
    }

    public function getNumNota2()
    {
        return $this->numNota2;
    }

    public function setNumNota2($numNota2)
    {
        $this->numNota2 = $numNota2;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($numPedido)
    {
        $this->numPedido = $numPedido;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($obs)
    {
        $this->obs = $obs;
    }

    public function getObs2()
    {
        return $this->obs2;
    }

    public function setObs2($obs2)
    {
        $this->obs2 = $obs2;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getQtde()
    {
        return $this->formatarValor($this->qtde, 3);
    }

    public function setQtde($qtde)
    {
        $this->qtde = $qtde;
    }

    public function getQtdeCada()
    {
        return $this->formatarValor($this->qtdeCada, 3);
    }

    public function setQtdeCada($qtdeCada)
    {
        $this->qtdeCada = $qtdeCada;
    }

    public function getQtdePedido()
    {
        return $this->formatarValor($this->qtdePedido, 3);
    }

    public function setQtdePedido($qtdePedido)
    {
        $this->qtdePedido = $qtdePedido;
    }

    public function getSaldo()
    {
        return $this->formatarValor($this->saldo, 2);
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    public function getSiglaUnidade()
    {
        return $this->siglaUnidade;
    }

    public function setSiglaUnidade($siglaUnidade)
    {
        $this->siglaUnidade = $siglaUnidade;
    }

    public function getSituacao()
    {
        $situacao = $this->situacao;

        if ($situacao == 'A')
            return 'Aberto';
        else if ($situacao == 'E')
            return 'Encerrado';
        else if ($situacao == 'C')
            return 'Cancelado';
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function getUnidade()
    {
        return $this->unidade;
    }

    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
    }

    public function getValorCarrega()
    {
        return $this->formatarValor($this->valorCarrega, 2);
    }

    public function setValorCarrega($valorCarrega)
    {
        $this->valorCarrega = $valorCarrega;
    }

    public function getValorFrete()
    {
        return $this->formatarValor($this->valorFrete, 2);
    }

    public function setValorFrete($valorFrete)
    {
        $this->valorFrete = $valorFrete;
    }

    public function getValorNota2()
    {
        return $this->formatarValor($this->valorNota2, 2);
    }

    public function setValorNota2($valorNota2)
    {
        $this->valorNota2 = $valorNota2;
    }

    public function getValorPedido()
    {
        return $this->formatarValor($this->valorPedido, 2);
    }

    public function setValorPedido($valorPedido)
    {
        $this->valorPedido = $valorPedido;
    }

    public function getVisto()
    {
        return $this->visto;
    }

    public function setVisto($visto)
    {
        $this->visto = $visto;
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