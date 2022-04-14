<?php
    session_start();
    use App\Models\cargaModel;
    use App\DAO\CargaDAO;

    require_once "cabecalho.php";
    require_once "App/Models/cargaModel.php";
    require_once "App/DAO/CargaDAO.php";

    $id = $_GET['id'] ?? 0;

    $cargaDAO = new CargaDAO();
    $model = $cargaDAO->find($id);

    $cargaModel = new cargaModel();
    $cargaModel->setId($model->id);
    $cargaModel->setData($model->data);
    $cargaModel->setSituacao($model->situacao);
    $cargaModel->setQtdePedido($model->qtde_pedido);
    $cargaModel->setValorPedido($model->valor_pedido);
    $cargaModel->setValorFrete($model->valor_frete);
    $cargaModel->setQtde($model->qtde);
    $cargaModel->setQtdeCada($model->qtde_cada);
    $cargaModel->setSaldo($model->saldo);
    $cargaModel->setDataNf($model->data_nf);
    $cargaModel->setValorCarrega($model->valor_carrega);
    $cargaModel->setLetra($model->letra);
    $cargaModel->setVisto($model->visto);
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
            <label>Id Carga</label>
            <input type="texto" class="form-control" id="codigo-carga" name="codigo-carga" value="<?php echo $model->codigo ?>">
        </div>

        <div class="col-sm-2">
            <label>Nro Carga</label>
            <input type="texto" class="form-control" id="num-carga" name="num-carga" value="<?php echo $model->num_carga ?>">
        </div>

        <div class="col-sm-2">
            <label>Letra</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getLetra() ?>">
        </div>

        <div class="col-sm-2">
            <label>Visto</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getVisto() ?>">
        </div>

        <div class="col-sm-2">
            <label>Data</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getData() ?>">
        </div>

        <div class="col-sm-2">
            <label>Situação</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getSituacao() ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Motorista</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_motorista ?>">
        </div>
            
        <div class="col-sm-2">
            <label>Nro Pedido</label>
            <input type="texto" class="form-control" value="<?php echo $model->num_pedido ?>">
        </div>   

        <div class="col-sm-2">
            <label>Nro NF</label>
            <input type="texto" class="form-control" value="<?php echo $model->num_nf ?>">
        </div>

        <div class="col-sm-2">
            <label>Data NF</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getDataNf() ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <label>Indicação</label>
            <input type="texto" class="form-control" value="<?php echo $model->contato_indicacao ?>">
        </div>
            
        <div class="col-sm-2">
            <label>Placa</label>
            <input type="texto" class="form-control" value="<?php echo $model->placa ?>">
        </div> 
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label>Fornecedor</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_fornecedor; ?>">
        </div>
            
        <div class="col-sm-4">
            <label>Quantidade do Pedido</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getQtdePedido() ?>">
        </div>
        
        <div class="col-sm-2">
            <label>Valor Pedido</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getValorPedido() ?>">
        </div>
        <div class="col-sm-2">
            <label>Valor Diferença</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getValorCarrega() ?>">
        </div> 
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Cliente</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_cliente ?>">
        </div>
            
        <div class="col-sm-6">
            <label>Contato</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_contato ?>">
        </div> 
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>Valor Frete</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getValorFrete() ?>">
        </div>
            
        <div class="col-sm-2">
            <label>Quantidade Entregar</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getQtde() ?>">
        </div> 
        <div class="col-sm-2">
            <label>Quantidade Kg Cada</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getQtdeCada() ?>">
        </div> 
        <div class="col-sm-2">
            <label>Saldo</label>
            <input type="texto" class="form-control" value="<?php echo $cargaModel->getSaldo() ?>">
        </div>
        <div class="col-sm-2">
            <label>Unidade</label>
            <input type="texto" class="form-control" value="<?php echo $model->sigla_unidade ?>">
        </div> 
        <div class="col-sm-2">
            <label>Complemento</label>
            <input type="texto" class="form-control" value="<?php echo $model->compl_unidade ?>">
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Usina</label>
            <input type="texto" class="form-control" value="<?php echo $model->nome_usina ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Observação</label>
            <textarea class="form-control" id="obs" rows="3"><?php echo $model->obs ?></textarea>
        </div>
            
        <div class="col-sm-6">
            <label>Observação2</label>
            <textarea class="form-control" id="obs2" rows="3"><?php echo $model->obs2 ?></textarea>
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
  <script type="text/javascript" src="js/bootstrap.minjs"></script>  
</body>
</html>