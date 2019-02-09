<?php
	include_once("conexao.php");
	$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
	$sql = "SELECT * FROM documentos WHERE responsavel like '%$filtro%' ORDER BY responsavel";
	$consulta = mysqli_query($conexao, $sql);
	$registros = mysqli_num_rows($consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="Sedoc" content="Controle de documentos">
		<meta name="Thiago" content="Thiago da Silva Alves">
		<title>SEDOC - TABELA</title>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/jquery.dataTables.min.css">
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
				<h1 class="mt-5">Tabela de documentos!</h1>
				<p class="lead">Tabela para comtrole dos documentos.</p><br>
					<div id="tabela" class="table-responsive">
						<table class="table table-bordered table-hover" id="table_id">
							<thead>
								<tr>
									<th>Cod</th>
									<th>Tipo</th>
									<th>Recebedor</th>
									<th>Data</th>
									<th>Hora</th>
									<th>Especificação</th>
									<th>Responsável</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while($exibirReg = mysqli_fetch_array($consulta)){
										$codigo = $exibirReg[0];
										$tipo = $exibirReg[1];
										$recebedor = $exibirReg[2];
										$data = $exibirReg[3];
										$hora = $exibirReg[4];
										$especificacao = $exibirReg[5];
										$responsavel = $exibirReg[6];
								?>
								<tr>
									<td><?php echo $codigo;?></td>
									<td><?php echo $tipo;?></td>
									<td><?php echo $recebedor;?></td>
									<td><?php echo $data;?></td>
									<td><?php echo $hora;?></td>
									<td><?php echo $especificacao ;?></td>
									<td><?php echo $responsavel ;?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
	<br>
	<br>
    </div>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="vendor/jquery/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#table_id').DataTable();
		});
	</script>
</body>
</html>