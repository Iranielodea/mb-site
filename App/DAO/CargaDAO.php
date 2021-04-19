<?php
namespace App\DAO;

require_once 'App/DAO/Crud.php';

use App\DAO\Crud;
use App\Models\CargaFiltroModel;

class CargaDAO extends Crud
{
    protected $tabela = "carga ";

    public function getAll(CargaFiltroModel $cargaFiltroModel)
    {
        $sql = "SELECT id, num_carga, letra, num_pedido, data, nome_cliente, valor_pedido, nome_fornecedor FROM $this->tabela";
        $sql = $sql . " WHERE id is not null";

        if ($cargaFiltroModel->dataInicial != null)
            $sql = $sql . " AND data >= '{$cargaFiltroModel->dataInicial}'";

        if ($cargaFiltroModel->dataFinal != null)
            $sql = $sql . " AND data <= '{$cargaFiltroModel->dataFinal}'";
        
        if ($cargaFiltroModel->codCliente != null)
            $sql = $sql . " AND cod_cliente = '{$cargaFiltroModel->codCliente}'";

        if ($cargaFiltroModel->codFornecedor != null)
            $sql = $sql . " AND cod_For = '{$cargaFiltroModel->codFornecedor}'";

        $sql = $sql . " ORDER BY data, num_carga";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}