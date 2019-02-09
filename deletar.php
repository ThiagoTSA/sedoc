<?php
	session_start();
	include_once("conexao.php");
	if(isset($_GET['delete'])){
		$cod = $_GET['delete'];
		$sql = "DELETE FROM documentos WHERE id=$cod";
		$excluir = mysqli_query($conexao, $sql);
		mysqli_close($conexao);
		header("location: tabelaAdmin.php");
	}
?>