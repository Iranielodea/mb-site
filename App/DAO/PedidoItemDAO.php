<?php

namespace App\DAO;

require_once 'App/DAO/Crud.php';

use App\DAO\Crud;

class PedidoItemDAO extends Crud
{
    protected $tabela = "pedido_item ";

    public function obterPorNumPedido($numPedido){
        $sql = "SELECT * FROM $this->tabela WHERE num_pedido = :numPedido";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':numPedido', $numPedido);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}