<?php
	include('session.php');
	//var_dump($_POST);
	$obj = $_POST;
	
	$nome_completo = $obj['nome_completo'];
	$cpf = $obj['cpf'];
	$rg = $obj['rg'];
	$email_contato = $obj['email_contato'];
	$tel_contato = $obj['tel_contato'];
	
	$stmt = $pdo->prepare("SELECT * FROM cliente WHERE id_usuario = ?;");

	$stmt -> execute([$srow['id_usuario']]);
	
	$data = $stmt->fetchAll();
	var_dump($data);
	$result = $stmt->rowcount();
	
	if ($result>0)
	{
		if($nome_completo == NULL)
			$nome_completo = $data[0]['nome_completo'];
		if($cpf == NULL)
			$cpf = $data[0]['cpf'];
		if($rg == NULL)
			$rg = $data[0]['rg'];
		if($email_contato == NULL)
			$email_contato = $data[0]['email_contato'];
		if($tel_contato == NULL)
			$tel_contato = $data[0]['tel_contato'];
		
		$stmt = $pdo->prepare("UPDATE cliente SET nome_completo = ?, cpf = ?, rg = ?, email_contato = ?, tel_contato = ? WHERE id_usuario = ?;");

		if(	$stmt -> execute([$nome_completo, $cpf, $rg, $email_contato, $tel_contato, $srow['id_usuario']])	)
		{
			echo 'Cliente modificado';
			echo '<br>';
			echo 'Retornando em 3 segundos';
			http_response_code(200);
			header('refresh:3; /imovel/users/index.php');
		}else 
		{
			echo 'Erro na query';
			echo '<br>';		
			http_response_code(403);
		}
	}
	else
	{
		$stmt = $pdo->prepare("INSERT INTO cliente(nome_completo, cpf, rg, email_contato, tel_contato, id_usuario) VALUES(?,?,?,?,?,?);");

		if(	$stmt -> execute([$nome_completo, $cpf, $rg, $email_contato, $tel_contato, $srow['id_usuario']])	)
		{
			echo 'Cliente adicionado';
			echo '<br>';
			echo 'Retornando em 3 segundos';
			http_response_code(201);
			header('refresh:3; /imovel/users/index.php');
		}else 
		{
			echo 'Erro na query';
			echo '<br>';		
			http_response_code(403);
		}
	}
?>