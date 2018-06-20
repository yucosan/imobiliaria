<?php
$obj = $_POST;
include('/session.php');
$id_imovel = $_GET['id'];
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
else $tipo = null;


	$stmt = $pdo->prepare("SELECT imagem1, imagem2, imagem3 from imovel where id_imovel = ? AND id_responsavel = ?;");

	$stmt -> execute([$id_imovel, $id_responsavel]);

	$data = $stmt->fetchAll();

if(!empty($_FILES['imagem1']['tmp_name']) && file_exists($_FILES['imagem1']['tmp_name'])) {
   // $imagem1= addslashes(file_get_contents($_FILES['imagem1']['tmp_name']));
	$imagem1= base64_encode(file_get_contents($_FILES['imagem1']['tmp_name']));
}
else {
		$imagem1= $data[0]['imagem1'];
};
if(!empty($_FILES['imagem2']['tmp_name']) && file_exists($_FILES['imagem2']['tmp_name'])) {
    $imagem2= base64_encode(file_get_contents($_FILES['imagem2']['tmp_name']));
}
else {
		$imagem2= $data[0]['imagem2'];
};
if(!empty($_FILES['imagem3']['tmp_name']) && file_exists($_FILES['imagem3']['tmp_name'])) {
    $imagem3= base64_encode(file_get_contents($_FILES['imagem3']['tmp_name']));
}
else {
		$imagem3= $data[0]['imagem3'];
};

	$stmt = $pdo->prepare("SELECT email_contato, tel_contato FROM cliente WHERE id_usuario = ?;");

	$stmt -> execute([$id_responsavel]);

	$data = $stmt->fetchAll();
	
	$stmt = $pdo->prepare("UPDATE imovel SET n_quartos = ?, n_banheiros = ?, area = ?, cep = ?, rua = ?,
	 bairro = ?, cidade = ?, email_contato = ?, tel_contato = ?, preco = ?, tipo = ?, imagem1 = ?, imagem2 = ?, imagem3 = ? 
	 WHERE id_imovel = ? AND id_responsavel = ?;");

	if(	$stmt -> execute([$n_quartos, $n_banheiros, $area, $cep, $rua, $bairro,
	$cidade, $data[0]['email_contato'], $data[0]['tel_contato'], $preco, $tipo, 
	$imagem1, $imagem2, $imagem3, $id_imovel, $id_responsavel])	)	
	{
		echo 'Imovel editado com sucesso';
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
