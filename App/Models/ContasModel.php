<?php

namespace App\Models;

class ContasModel
{
    private $id;
    private $codigo;
    private $numPedido;
    private $nomeCliente;
    private $nomeFornecedor;
    private $dataEmissao;
    private $valorPagar;
    private $dataVencto;
    private $dias;
    private $dataPago;
    private $valorPago;
    private $seqConta;
    private $valorOriginal;
    private $tipoConta;
    private $situacao;
    private $documento;
    private $nomeFormaPagto;
    private $contaBancoId;
    private $pedidoId;
    private $codCliente;
    private $codFor;
    private $totalPagar;
    private $totalPago;
    private $saldo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($value)
    {
        $this->numPedido = $value;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($value)
    {
        $this->nomeCliente = $value;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($value)
    {
        $this->nomeFornecedor = $value;
    }

    public function getDataEmissao()
    {
        return $this->formatarData($this->dataEmissao);
    }

    public function setDataEmissao($value)
    {
        $this->dataEmissao = $value;
    }

    public function getValorPagar()
    {
        return $this->formatarValor($this->valorPagar, 2);
    }

    public function setValorPagar($value)
    {
        $this->valorPagar = $value;
    }

    public function getDataVencto()
    {
        return $this->formatarData($this->dataVencto);
    }

    public function setDataVencto($value)
    {        
        $this->dataVencto = $value;
    }

    public function getDias()
    {
        return $this->dias;
    }

    public function setDias($value)
    {
        $this->dias = $value;
    }

    public function getDataPago()
    {
        return $this->dataPago;
    }

    public function setDataPago($value)
    {
        $this->dataPago = $value;
    }

    public function getValorPago()
    {
        return $this->formatarValor($this->valorPago, 2);
    }

    public function setValorPago($value)
    {
        $this->valorPago = $value;
    }

    public function getSeqConta()
    {
        return $this->seqConta;
    }

    public function setSeqConta($value)
    {
        $this->seqConta = $value;
    }

    public function getValorOriginal()
    {
        return $this->valorOriginal;
    }

    public function setValorOriginal($value)
    {
        $this->valorOriginal = $value;
    }

    public function getTipoConta()
    {
        return $this->tipoConta;
    }

    public function setTipoConta($value)
    {
        $this->tipoConta = $value;
    }

    public function getSituacao()
    {
        if ($this->situacao == 'A')
            return 'Aberto';
        else
            return 'Pago';
    }

    public function setSituacao($value)
    {
        $this->situacao = $value;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($value)
    {
        $this->documento = $value;
    }

    public function getNomeFormaPagto()
    {
        return $this->nomeFormaPagto;
    }

    public function setNomeFormaPagto($value)
    {
        $this->nomeFormaPagto = $value;
    }

    public function getContaBancoId()
    {
        return $this->contaBancoId;
    }

    public function setContaBancoId($value)
    {
        $this->contaBancoId = $value;
    }

    public function getPedidoId()
    {
        return $this->pedidoId;
    }

    public function setPedidoId($value)
    {
        $this->pedidoId = $value;
    }

    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }

    public function getCodFor()
    {
        return $this->codFor;
    }

    public function setCodFor($codFor)
    {
        $this->codFor = $codFor;
    }

    private function formatarValor($valor, $casas)
    {
        return number_format($valor, $casas,",", ".");
    }

    private function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    public function getTotalPagar()
    {
        return $this->formatarValor($this->totalPagar, 2);
    }

    public function setTotalPagar($totalPagar)
    {
        $this->totalPagar = $totalPagar;
    }

    public function getTotalPago()
    {
        return $this->formatarValor($this->totalPago,2);
    }

    public function setTotalPago($totalPago)
    {
        $this->totalPago = $totalPago;
    }

    public function getSaldo()
    {
        return $this->formatarValor($this->totalPagar - $this->totalPago,2);
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }
}