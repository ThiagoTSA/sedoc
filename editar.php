<?php
	session_start();
	include_once("conexao.php");	
		$cod = $_POST['id'];
		$tipo = strtoupper($_POST['tipo']);
		$recebedor = strtoupper($_POST['recebedor']);
		$data = $_POST['data'];
		$hora = $_POST['hora'];
		$especificacao = strtoupper($_POST['especificacao']);
		$responsavel = strtoupper($_POST['responsavel']);	
		$sql = "UPDATE documentos SET tipo='$tipo', recebedor='$recebedor',data = '$data', hora = '$hora', especificacao = '$especificacao', responsavel = '$responsavel' WHERE id = '$cod'";		
		$editar = mysqli_query($conexao, $sql);
		mysqli_close($conexao);
		header("location: tabelaAdmin.php");
?>