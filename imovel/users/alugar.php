<?php
	include('session.php');
	
	$id_imovel = $_GET['id'];
	
	$update = false;
	$insert = false;
	
	$stmt = $pdo->prepare("SELECT * FROM imovel WHERE id_imovel = ?;");

	$stmt -> execute([$id_imovel]);
	
	$data = $stmt->fetchAll();
	
	$id_proprietario = $data[0]['id_responsavel'];
	
	$valor = $data[0]['preco'];
	
	$stmt = $pdo->prepare("UPDATE imovel SET disponivel = false WHERE id_imovel = ?;");

	if(	$stmt -> execute([$id_imovel])	)
		$update = true;
	
	$stmt = $pdo->prepare("INSERT INTO contrato(id_proprietario, id_inquilino, id_imovel, valor) VALUES (?,?,?,?);");

	if(	$stmt -> execute([$id_proprietario, $srow['id_usuario'], $id_imovel, $valor])	)
		$insert = true;
		
	if(	$insert && $update	)
	{
		echo 'Imovel alugado';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		http_response_code(200);
		header('refresh:3; /imovel/users/index.php');
	}
	else 
	{
		echo 'Erro';
		echo '<br>';		
		http_response_code(403);
	}

?>