<?php
	session_start();
	$nome = $_POST["nome"];
	$senha = $_POST["senha"];	
	if(($nome == "tsa") && ($senha == "tsa")){
		$_SESSION['nome'] = $nome;
		header('Location: tabelaAdmin.php');
	}else{
		header('Location: admin.html');
		exit();
	}
?>