<?php
	$obj = $_POST;
	include "db.php";
	
	session_start();
	
	$username = $obj['username'];
	$password = $obj['password'];

	$stmt = $pdo->prepare("SELECT id_usuario, nome, senha FROM autenticacao WHERE nome = ? AND senha = ?;");

	$stmt -> execute([$username, $password]);
	$data = $stmt->fetchAll();
	//var_dump($data);
		
	if ($data)
	{
	    	$_SESSION['id'] = $data[0]['id_usuario'];
		//	echo $_SESSION['id'];
			//echo '<br>';
	    	header('location: users/index.php');
            http_response_code(202);
            echo' Usuario logado';
	    	header('location: users/index.php');
	}
	else
	{
		http_response_code(403);
		echo 'Usuario ou senha errados';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		header('refresh:3; /imovel/index.php');
	}
?>
