<?php
	session_start();
	include('verifica_login.php');
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
		<title>SEDOC - TABELA (ADM)</title>
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
				<h3><font color="red">ADMINISTRADOR</font></h3>
				<!--********************************************************************************-->
				<hr/>
				<?php
					if(isset($_GET['editar'])){
					$codigo = $_GET['editar'];
					$sql = "SELECT * FROM documentos WHERE id=$codigo";
					$dados = mysqli_query($conexao, $sql);
					$elemento = mysqli_fetch_array($dados);						
						$tipo = $elemento['tipo'];
						$recebedor = $elemento['recebedor'];
						$data = $elemento['data'];
						$hora = $elemento['hora'];
						$especificacao = $elemento['especificacao'];
						$responsavel = $elemento['responsavel'];													
				?>
				<form method="POST" action="editar.php">
					<div class="form-row align-items-center">
						<div class="form-group col-sm-1">
							<label for="nome"><font color="red"><strong>ID:</strong></font></label>
							<input type="text"
								style="text-transform:uppercase"
								name="id"
								class="form-control"
								id="id"
								maxlength="4"
								value="<?php echo $codigo ?>"
								required>
						</div>
						<div class="form-group col-sm-6">
							<label for="nome"><font color="red"><strong>Tipo:</strong></font></label>
							<input type="text"
								style="text-transform:uppercase"
								name="tipo"
								class="form-control"
								id="tipo"
								maxlength="50"
								value="<?php echo $tipo ?>"
								required>
						</div>
						<div class="form-group col-sm-5">
							<label for="telefone"><font color="red"><strong>Recebedor:</strong></font></label>
							<input type="text" 
								style="text-transform:uppercase"
								name="recebedor"
								class="form-control"
								id="recebedor"
								maxlength="30"
								value = "<?php echo $recebedor ?>"
								required>
						</div>
						<div class="form-group col-sm-3">
							<label for="data"><font color="red"><strong>Data:</strong></font></label>
							<input type="date"
								name="data"
								class="form-control"
								id="data"
								value = "<?php echo $data ?>"
								required>
						</div>
						<div class="form-group col-sm-3">
							<label for="hora"><font color="red"><strong>Hora:</strong></font></label>
							<input type="time"
								name="hora"
								class="form-control"
								id="hora"
								value = "<?php echo $hora ?>"
								required>
						</div>
						<div class="form-group col-sm-6">
							<label for="nome"><font color="red"><strong>Especificação:</strong></font></label>
							<input type="text"
								style="text-transform:uppercase"
								name="especificacao"
								class="form-control"
								id="especificacao"
								maxlength="50"
								value = "<?php echo $especificacao ?>">
						</div>
						<div class="form-group col-sm-3">
							<label for="telefone"><font color="red"><strong>Responsável:</strong></font></label>
							<input type="text"
								style="text-transform:uppercase"
								name="responsavel"
								class="form-control"
								id="responsavel"
								maxlength="50"
								value = "<?php echo $responsavel ?>">
						</div>
						<div class="col-auto">
							<button type="submit"
								class="btn btn-danger btn-sm"
								value="Editar">Editar
							</button>
						</div>
					</div>
				</form>
				<hr/>
				<?php
				}
				?><br>
				<!--********************************************************************************-->
				<p class="lead">Tabela para controle dos documentos.</p>
					<form action=imprimir.php method=get target="_blank">
						<input type=submit value='Gerar PDF do Banco de Dados'/>
					</form>
					<br>					
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
									<th>Excluir</th>
									<th>Editar</th>
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
									<td>
										<center>
											<a href="deletar.php?delete=<?php echo $codigo; ?>" onclick="return confirm('Confirma exclusão de registro?');">Deletar</a>
										</center>
									</td>
									<td>
										<center>
											<a href="tabelaAdmin.php?editar=<?php echo $codigo; ?>">Editar</a>
										</center>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
		<form action=excluirAll.php method=get>
			<input type=submit value='Excluir toda a DABE DE DADOS' onclick="return confirm('Confirma exclusão de toda a base de dados?');"/>
		</form>
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