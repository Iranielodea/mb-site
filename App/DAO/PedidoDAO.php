<?php

namespace App\DAO;

require_once 'App/DAO/Crud.php';

use App\Models\PedidoModel;
use App\Models\PedidoFiltro;
use App\DAO\Crud;

class PedidoDAO extends Crud
{
    protected $tabela = "pedido ";

    public function getAll(PedidoFiltro $pedidoFiltro)
    {
        $sql = "SELECT id, num_pedido, data, nome_cliente, total_liquido FROM $this->tabela";
        $sql = $sql . " WHERE id is not null";

        if ($pedidoFiltro->dataInicial != null)
            $sql = $sql . " AND data >= '{$pedidoFiltro->dataInicial}'";

        if ($pedidoFiltro->dataFinal != null)
            $sql = $sql . " AND data <= '{$pedidoFiltro->dataFinal}'";
        
        if ($pedidoFiltro->nomeCliente != '0')
            $sql = $sql . " AND nome_cliente = '{$pedidoFiltro->nomeCliente}'";

        if ($pedidoFiltro->numPedido != null)
            $sql = $sql . " AND num_pedido = {$pedidoFiltro->numPedido}";

        $sql = $sql . " ORDER BY data, num_pedido";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obterPorNumPedido($numPedido){
        $sql = "SELECT * FROM $this->tabela WHERE num_pedido = :numPedido";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':numPedido', $numPedido);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function salvar(PedidoModel $model)
    {
        $sql = "";
        $id = $model->getId();

        if ($id == 0)
        {
            $sql = "INSERT INTO $this->tabela (
                num_pedido,
                nome_cliente,
                data,
                total_bruto,
                perc_desconto,
                valor_desconto,
                total_liquido,
                situacao,
                nome_fornecedor,
                obs,
                nome_contato,
                perc_comissao,
                encerrado,
                total_venda,
                total_lucro,
                total_qtde,
                num_carga,
                valor_lucro,
                nome_vendedor,
                valor_comissao,
                total_comissao,
                nome_usina
            )
            VALUES(
                :num_pedido,
                :nome_cliente,
                :data,
                :total_bruto,
                :perc_desconto,
                :valor_desconto,
                :total_liquido,
                :situacao,
                :nome_fornecedor,
                :obs,
                :nome_contato,
                :perc_comissao,
                :encerrado,
                :total_venda,
                :total_lucro,
                :total_qtde,
                :num_carga,
                :valor_lucro,
                :nome_vendedor,
                :valor_comissao,
                :total_comissao,
                :nome_usina                
            )";
        }
        else
        {
            $sql = "UPDATE ".$this->tabela. "SET
                num_pedido = :num_pedido,
                nome_cliente = :nome_cliente,
                data = :data,
                total_bruto = :total_bruto,
                perc_desconto = :perc_desconto,
                valor_desconto = :valor_desconto,
                total_liquido = :total_liquido,
                situacao = :situacao,
                nome_fornecedor = :nome_fornecedor,
                obs = :obs,
                nome_contato = :nome_contato,
                perc_comissao = :perc_comissao,
                encerrado = :encerrado,
                total_venda = :total_venda,
                total_lucro = :total_lucro,
                total_qtde = :total_qtde,
                num_carga = :num_carga,
                valor_lucro = :valor_lucro,
                nome_vendedor = :nome_vendedor,
                valor_comissao = :valor_comissao,
                total_comissao = :total_comissao,
                nome_usina = :nome_usina
                WHERE id = :id
            ";
        }

        $numPedido = $model->getNumPedido();
        $nomeCliente = $model->getNomeCliente();
        $data = $model->getData();
        $totalBruto = $model->getTotalBruto();
        $percDesconto = $model->getPercDesconto();
        $valorDesconto = $model->getValorDesconto();
        $totalLiquido = $model->getTotalLiquido();
        $situacao = $model->getSituacao();
        $nomeFornecedor = $model->getNomeFornecedor();
        $obs = $model->getObs();
        $nomeContato = $model->getNomeContato();
        $percComissao = $model->getPercComissao();
        $encerrado = $model->getEncerrado();
        $totalVenda = $model->getTotalVenda();
        $totalLucro = $model->getTotalLucro();
        $totalQtde = $model->getTotalQtde();
        $numCarga = $model->getNumCarga();
        $valorLucro = $model->getValorLucro();
        $nomeVendedor = $model->getNomeVendedor();
        $valorComissao = $model->getValorComissao();
        $totalComissao = $model->getTotalComissao();
        $nomeUsina = $model->getNomeUsina();

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':num_pedido', $numPedido);
        $stmt->bindParam(':nome_cliente', $nomeCliente);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':total_bruto', $totalBruto);
        $stmt->bindParam(':perc_desconto', $percDesconto);
        $stmt->bindParam(':valor_desconto', $valorDesconto);
        $stmt->bindParam(':total_liquido', $totalLiquido);
        $stmt->bindParam(':situacao', $situacao);
        $stmt->bindParam(':nome_fornecedor', $nomeFornecedor);
        $stmt->bindParam(':obs', $obs);
        $stmt->bindParam(':nome_contato', $nomeContato);
        $stmt->bindParam(':perc_comissao', $percComissao);
        $stmt->bindParam(':encerrado', $encerrado);
        $stmt->bindParam(':total_venda', $totalVenda);
        $stmt->bindParam(':total_lucro', $totalLucro);
        $stmt->bindParam(':total_qtde', $totalQtde);
        $stmt->bindParam(':num_carga', $numCarga);
        $stmt->bindParam(':valor_lucro', $valorLucro);
        $stmt->bindParam(':nome_vendedor', $nomeVendedor);
        $stmt->bindParam(':valor_comissao', $valorComissao);
        $stmt->bindParam(':total_comissao', $totalComissao);
        $stmt->bindParam(':nome_usina', $nomeUsina);

        if ($id > 0)
            $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}