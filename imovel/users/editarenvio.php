<?php
$obj = $_POST;
include('/session.php');
//var_dump($obj);
$id_responsavel = $_SESSION['id'];
$n_quartos = $obj["n_quartos"];
$n_banheiros = $obj["n_banheiros"];
$area = $obj["area"];
$cep = $obj["cep"];
$rua = $obj["rua"];
$bairro = $obj["bairro"];
$cidade = $obj["cidade"];
$preco = $obj["preco"];
if(isset($obj["tipo"]))
$tipo = $obj["tipo"];

if(!empty($_FILES['imagem1']['tmp_name']) && file_exists($_FILES['imagem1']['tmp_name'])) {
   // $imagem1= addslashes(file_get_contents($_FILES['imagem1']['tmp_name']));
	$imagem1= base64_encode(file_get_contents($_FILES['imagem1']['tmp_name']));
}
else {
		$imagem1= NULL;
};
if(!empty($_FILES['imagem2']['tmp_name']) && file_exists($_FILES['imagem2']['tmp_name'])) {
    $imagem2= base64_encode(file_get_contents($_FILES['imagem2']['tmp_name']));
}
else {
		$imagem2= NULL;
};
if(!empty($_FILES['imagem3']['tmp_name']) && file_exists($_FILES['imagem3']['tmp_name'])) {
    $imagem3= base64_encode(file_get_contents($_FILES['imagem3']['tmp_name']));
}
else {
		$imagem3= NULL;
};

	$stmt = $pdo->prepare("SELECT email_contato, tel_contato FROM cliente WHERE id_usuario = ?;");

	$stmt -> execute([$id_responsavel]);

	$data = $stmt->fetchAll();
	//var_dump($data);
	
	$sql = "UPDATE imovel(id_responsavel";
	$sql2 = "VALUES("
	if($n_quartos != NULL)
	{
		$sql = $sql + ", n_quartos";
		$sql2 = $sql2 + "?";
	}
	if($n_banheiros != NULL)
	{
		$sql = $sql + ", n_banheiros";
		$sql2 = $sql2 + "?";
	}
	if($area != NULL)
	{
		$sql = $sql + ", area";
		$sql2 = $sql2 + "?";
	}
	if($cep != NULL)
	{
		$sql = $sql + ", cep";
		$sql2 = $sql2 + "?";
	}
	if($rua != NULL)
	{
		$sql = $sql + ", rua";
		$sql2 = $sql2 + "?";
	}
	if($bairro != NULL)
	{
		$sql = $sql + ", bairro";
		$sql2 = $sql2 + "?";
	}
	if($cidade != NULL)
	{
		$sql = $sql + ", cidade";
		$sql2 = $sql2 + "?";
	}
	if($email_contato != NULL)
	{
		$sql = $sql + ", email_contato";
		$sql2 = $sql2 + "?";
	}
	if($tel_contato != NULL)
	{
		$sql = $sql + ", tel_contato";
		$sql2 = $sql2 + "?";
	}
	if($preco != NULL)
	{
		$sql = $sql + ", preco";
		$sql2 = $sql2 + "?";
	}
	if($tipo != NULL)
	{
		$sql = $sql + ", tipo";
		$sql2 = $sql2 + "?";
	}
	if($imagem1 != NULL)
	{
		$sql = $sql + ", imagem1";
		$sql2 = $sql2 + "?";
	}
	if($imagem2 != NULL)
	{
		$sql = $sql + ", imagem2";
		$sql2 = $sql2 + "?";
	}
	if($imagem3 != NULL)
	{
		$sql = $sql + ", imagem3";
		$sql2 = $sql2 + "?";
	}
	
	$sql = $sql + ")";
	

/*	, n_quartos, n_banheiros, area, cep, rua,
	 bairro, cidade, email_contato, tel_contato, preco, tipo, imagem1, imagem2, imagem3) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
	 */

	$stmt->bindParam(':n_quartos', $n_quartos);
	$stmt->bindParam(':n_banheiros', $n_banheiros);
	$stmt->bindParam(':area', $area);
	$stmt->bindParam(':cep', $cep);
	$stmt->bindParam(':rua', $rua);
	$stmt->bindParam(':bairro', $bairro);
	$stmt->bindParam(':cidade', $cidade);
	$stmt->bindParam(':preco', $preco);
	$stmt->bindParam(':tipo', $tipo);
	//$stmt = $pdo->prepare($sql);
/*
	if(	$stmt -> execute()	)	
	{
		echo 'Imovel adicionado';
		echo '<br>';
		echo 'Retornando em 3 segundos';
		http_response_code(200);
		header('refresh:3; /imovel/users/index.php');
	}else 
	{
		echo 'Erro na query';
		echo '<br>';		
		http_response_code(403);
	}/*/
	
?>
