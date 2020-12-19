
<!doctype html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Template para sticky footer e navbar fixa, usando Bootstrap.</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body class="d-flex flex-column h-100">

<div class="container">
  <ul class="nav nav-pills navbar-dark bg-dark">
  <!-- <li class="nav-item">
    <a class="nav-link active" href="#">Ativo</a>
  </li> -->
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Clientes</a>
      <a class="dropdown-item" href="transportadora.php">Transportadoras</a>
      <a class="dropdown-item" href="#">Algo mais aqui</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="login.php">Sair</a>
    </div>
  </li>
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Faturamento</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Ação</a>
      <a class="dropdown-item" href="#">Outra ação</a>
      <a class="dropdown-item" href="#">Algo mais aqui</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Link isolado</a>
    </div>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Desativado</a>
  </li>
</ul>
	<div class="p-3 mb-2 bg-dark text-white"></div>
	
	 <div class="jumbotron">
		<div class="shadow p-3 mb-5 bg-white rounded mx-auto">
			<label> Código </label>
			<input type="text" class="form-control"/>
			
			<div class="row mx-auto">
				<label> Nome </label>
				<input type="text" class="form-control"/>
			</div>
			<div class="row mx-auto">					
				<a class="btn btn-primary" href="#" role="button">Salvar</a>	
			</div>
			<div class="col px-md-5"><div class="p-3 border bg-light">Custom column padding</div></div>
			<div class="col px-md-5"><div class="p-3 border bg-light">Custom column padding</div></div>
		</div>
		
		<h1 class="display-4">Olá, mundo!</h1>
		<p class="lead">Este é um simples componente jumbotron para chamar mais atenção a um determinado conteúdo ou informação.</p>
		<hr class="my-4">
		<p>Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
		
		<a class="btn btn-primary btn-lg" href="#" role="button">Leia mais</a>	
	</div>
    <!-- Principal JavaScript do Bootstrap
</div>
 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<!--<script src="https://code.jquery.com/jquery-2.1.3.min.js></script> -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
	
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<!-- <script src="js/jquery.min.js"></script> -->
	
  </body>
</html>
