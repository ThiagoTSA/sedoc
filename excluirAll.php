<?php
	session_start();
	include_once("conexao.php");
	$sql = "DELETE FROM documentos WHERE id";
	$excluir = mysqli_query($conexao, $sql);
	mysqli_close($conexao);
	header("location: tabelaAdmin.php");
?>