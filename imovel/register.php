<?php
$obj = $_POST;
include "db.php";
/*
var_dump($_POST);
echo $_POST['username'];
echo '<br>';
var_dump($obj);
echo $obj['subject'];
echo '<br>';
echo file_get_contents('php://input');
var_dump($obj);*/

$username = $obj['username'];
$password = $obj['password'];
$email = $obj['email'];
$tipo = $obj['tipo'];

	$stmt = $pdo->prepare("SELECT * FROM autenticacao WHERE nome = ? OR email = ?;");

	$stmt -> execute([$username, $email]);
	
	$data = $stmt->fetchAll();
	
	if($data)
	{
		var_dump($data);
		http_response_code(403);
		exit("Usuario ou email ja cadastrado");
	}
	else
	{
		$stmt = $pdo->prepare("INSERT INTO autenticacao(nome, email, senha, tipo) VALUES (?, ?, ?, ?);");

		$stmt -> execute([$username, $email, $password, $tipo]);
		
		echo 'Usuario cadastrado com sucesso';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		http_response_code(201);
		header('refresh:3; /imovel/index.php');
	}
	//$result = $stmt->rowcount();
?>

