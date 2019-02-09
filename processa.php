<?php
	session_start();
	include_once("conexao.php");
	$tipo = strtoupper($_POST['tipo']);
	$recebedor = strtoupper($_POST['recebedor']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$especificacao = strtoupper($_POST['especificacao']);
	$responsavel = strtoupper($_POST['responsavel']);	
	$sql = "INSERT INTO documentos(tipo, recebedor, data, hora, especificacao, responsavel) 
			VALUES('$tipo', '$recebedor', '$data', '$hora', '$especificacao', '$responsavel')";
	$Salvar = mysqli_query($conexao, $sql) or die ( mysqli_error( ));
	$linhas = mysqli_affected_rows($conexao);
	mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="Sedoc" content="Controle de documentos">
		<meta name="Thiago" content="Thiago da Silva Alves">
		<title>SEDOC - CADASTRO</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="#">SEDOC - Ministério do Esporte</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Cadastro
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tabela.php">Tabela</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin.html">Administração</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sobre.html">Sobre</a>
					</li>
				</ul>
			</div>
		</div>
    </nav>
    <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<br><br>
				<?php
					if($linhas == 1){
						print "<h1><font color='Green'>Cadastro efetuado com sucesso!</color></h1>";
						print "<h1><a href='index.html'>Voltar</a></h1>";
					}else{
						print "<h1><font color='red'>Cadastro não efetuado!</color></h1>";
						print "<h1><a href='index.html'>Voltar</a></h1>";
					}
				?>
			</div>
		</div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>				