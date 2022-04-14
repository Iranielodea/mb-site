<?php
    session_start();
    use App\Models\PedidoModel;
    use App\DAO\PedidoDAO;
    use App\DAO\PedidoItemDAO;
    use App\Models\PedidoItemModel;

    require_once "cabecalho.php";
    require_once "App/Models/PedidoModel.php";
    require_once "App/DAO/PedidoDAO.php";
    require_once "App/DAO/PedidoItemDAO.php";
    require_once "App/Models/PedidoItemModel.php";

    $id = $_GET['id'] ?? 0;

    $pedidoDAO = new PedidoDAO();
    $model = $pedidoDAO->find($id);

    $pedidoModel = new PedidoModel();
    $pedidoModel->setId($model->id);
    $pedidoModel->setData($model->data);
    $pedidoModel->setPercComissao($model->perc_comissao);
    $pedidoModel->setValorComissao($model->valor_comissao);
    $pedidoModel->setTotalLiquido($model->total_liquido);
    $pedidoModel->setTotalVenda($model->total_venda);
    $pedidoModel->setTotalLucro($model->total_lucro);

    $pedidoItemDAO = new PedidoItemDAO();
    $pedidoItemModel = new PedidoItemModel();

    $pedidoItem = $pedidoItemDAO->obterPorNumPedido($model->num_pedido);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalhes Transporte</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
  <div class="container">
    <h4><b>Detalhes do Pedido</b></h4>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-sm-2">
            <label>Nro Pedido</label>
            <input type="texto" class="form-control" id="num-pedido" name="num-pedido" value="<?php echo $model->num_pedido ?>">
        </div>

        <div class="col-sm-3">
            <label>Data</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getData() ?>">
        </div>

        <div class="col-sm-7">
            <label>Cliente</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_cliente ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>Fornecedor</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_fornecedor ?>">
        </div>
            
        <div class="col-sm-5">
            <label>Contato</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_contato ?>">
        </div>   

        <div class="col-sm-2">
            <label>(%Comissão)</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getPercComissao() ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>Vendedor</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_vendedor ?>">
        </div>
            
        <div class="col-sm-5">
            <label>Usina</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_usina ?>">
        </div> 
        
        <div class="col-sm-2">
            <label>Valor Comissão</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getValorComissao() ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label>Total Pedido</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getTotalLiquido(); ?>">
        </div>
            
        <div class="col-sm-4">
            <label>Total Venda</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getTotalVenda() ?>">
        </div>
        
        <div class="col-sm-4">
            <label>Total Diferença</label>
            <input type="texto" class="form-control" value="<?php echo $pedidoModel->getTotalLucro() ?>">
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="table-responsive table-striped table-hover">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>Produto</th>
            <th class="hidden-xs">Un</th>
            <th class="hidden-xs">Qtde</th>
            <th class="hidden-xs">Valor Pedido</th>
            <th class="hidden-xs">Total Pedido</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            if ($pedidoItem != null)
            {
                
                foreach($pedidoItem as $item)
                {
                    $pedidoItemModel->setNomeProduto($item->nome_produto);
                    $pedidoItemModel->setPrecoVenda($item->preco_venda);
                    $pedidoItemModel->setSiglaUn($item->sigla_un);
                    $pedidoItemModel->setQtde($item->qtde);
                    $pedidoItemModel->setTotalLucro($item->total_lucro);
                    $pedidoItemModel->setTotalVenda($item->total_venda);
                    $pedidoItemModel->setTotalLucro($item->total_lucro);
                    $pedidoItemModel->setValor($item->valor);
                    $pedidoItemModel->setValorTotal($item->valor_total);
                ?>
                <tr>
                    <td > <?php echo $pedidoItemModel->getNomeProduto() ?></td>
                    <td class="hidden-xs"> <?php echo $pedidoItemModel->getSiglaUn() ?></td>
                    <td class="hidden-xs"> <?php echo $pedidoItemModel->getQtde() ?></td>
                    <td class="hidden-xs"> <?php echo $pedidoItemModel->getValor() ?></td>
                    <td class="hidden-xs"> <?php echo $pedidoItemModel->getValorTotal() ?></td>
                </tr>
                <?php 
                }
            } 
        ?>
        </tbody>
        </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <hr>
            <button class="btn primary btn-primary" onclick="history.go(-1);">Voltar</button>
        </div>
    </div>
</div>
    
</div>

  <?php
    require_once 'rodape.php';
  ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>