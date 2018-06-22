<?php
	include('session.php');
	$obj = $_POST;
	$id_imovel = $_GET['id'];
	$reclamacao = $obj['reclamacao'];
	
	$stmt = $pdo->prepare("SELECT id_contrato FROM contrato WHERE id_imovel = ? AND id_inquilino = ?;");

	$stmt -> execute([$id_imovel, $srow['id_usuario']]);
	
	$data = $stmt->fetchAll();
	
	$id_contrato = $data[0]['id_contrato'];	

	$stmt = $pdo->prepare("INSERT INTO reclamacao(id_contrato, reclamacao) VALUES (?,?);");	
	if(	$stmt -> execute([$id_contrato, $reclamacao])	)
	{
		echo 'Reclamacao registrada';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		http_response_code(201);
		header('refresh:3; /imovel/users/index.php');
	}
	else 
	{
		echo 'Erro';
		echo '<br>';		
		http_response_code(403);
	}
?>