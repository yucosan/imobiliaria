<?php
include('/session.php');
$id_imovel = $_GET['id'];

$id_responsavel = $_SESSION['id'];

	$stmt = $pdo->prepare("DELETE FROM imovel WHERE id_imovel = ? AND id_responsavel = ?;");

	if(	$stmt -> execute([$id_imovel, $id_responsavel])	)
	{
		echo 'Imovel apagado com sucesso';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		http_response_code(200);
		header('refresh:3; /imovel/users/index.php');
	}else 
	{
		echo 'Erro';
		echo '<br>';		
		http_response_code(403);
	}
?>
