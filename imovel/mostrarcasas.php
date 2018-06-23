<?php
//var_dump($_POST);
	include "db.php";
$obj = $_POST;
$bairro = $obj['bairro'];
$tipo = $obj['tipo'];
$aux = 2;
$sql = "SELECT * FROM imovel WHERE disponivel = true AND bairro = ? AND tipo = ?";
//echo $sql;
//echo '<br>';
$sql2[0] = $bairro;
$sql2[1] = $tipo;
if($obj['n_quartos'] != NULL){
	$n_quartos = $obj['n_quartos'];
	$sql = $sql . " AND n_quartos >= ?";
	$sql2[$aux] = $n_quartos;
	$aux++;
}
if($obj['valor_min'] != NULL)
{
	$valor_min = $obj['valor_min'];
	$sql = $sql . " AND preco >= ?";
	$sql2[$aux] = $valor_min;
	$aux++;
}
if($obj['valor_max'] != NULL)
{
	$valor_max = $obj['valor_max'];
	$sql = $sql . " AND preco <= ?";
	$sql2[$aux] = $valor_max;
	$aux++;
}
if($obj['area'] != NULL){
	$area = $obj['area'];
	$sql = $sql . " AND area >= ?";
	$sql2[$aux] = $area;
	$aux++;
}
$sql = $sql . ";";
//echo $sql;
//echo '<br>';
	$stmt = $pdo->prepare($sql);
	//$stmt = $pdo->prepare("SELECT * FROM imovel WHERE disponivel = true AND bairro = ? AND tipo = ?;");
	
	$stmt -> execute($sql2);
	//$stmt -> execute([$bairro,$tipo]);

	$data = $stmt->fetchAll();
	
	$result = $stmt->rowcount();
	
	if ($result<2)
	echo "Existe ".$result." imovel disponivel";
else
	echo "Existem ".$result." imoveis disponiveis";
?>
<div class="card card-block" style="color:black;margin:2em auto 4em auto">
	<?php
	$aux2 = 0;
	if ($data) {
	?>
	<div class="row equal" style="height: ;">
		<?php
		while ($aux2 < $stmt->rowcount()) {
			$id_imovel[$aux2] = $data[$aux2]["id_imovel"];
			$id_responsavel[$aux2] = $data[$aux2]["id_responsavel"];
			$n_quartos[$aux2] = $data[$aux2]["n_quartos"];
			$n_banheiros[$aux2] = $data[$aux2]["n_banheiros"];
			$area[$aux2] = $data[$aux2]["area"];
			$cep[$aux2] = $data[$aux2]["cep"];
			$rua[$aux2] = $data[$aux2]["rua"];
			$bairro[$aux2] = $data[$aux2]["bairro"];
			$cidade[$aux2] = $data[$aux2]["cidade"];
			$email_contato[$aux2] = $data[$aux2]["email_contato"];
			$tel_contato[$aux2] = $data[$aux2]["tel_contato"];
			$disponivel[$aux2] = $data[$aux2]["disponivel"];
			$preco[$aux2] = $data[$aux2]["preco"];
			$tipo[$aux2] = $data[$aux2]["tipo"];
			$imagem1[$aux2] = $data[$aux2]["imagem1"];
		?>
		
		<div class="col-12 col-sm-12  col-md-6 col-lg-4">
			<div class="card" style="width: 18rem; margin-top: 3rem;">
			  <img class="card-img-top" style="height: 140px" src="<?php echo 'data:image/jpeg;base64,'.$imagem1[$aux2] ?>" alt="Card image cap">
			  <div class="card-body">
				<h5 class="card-title"> <?php echo $tipo ?></h5><!--
				<p class="card-text">Blablabla</p> -->
			  </div>
			  <ul class="list-group list-group-flush">
				<li class="list-group-item"><b>Quartos:</b> <?php echo $n_quartos[$aux2] ?></li>
				<li class="list-group-item"><b>Banheiros:</b> <?php echo $n_banheiros[$aux2] ?></li>
				<li class="list-group-item"><b>Area:</b> <?php echo $area[$aux2] ?></li>
				<li class="list-group-item"><b>Endereco:</b> <?php echo $rua[$aux2]. '<br>'. $cidade[$aux2] .' , '.$bairro[$aux2] .'<br>'.' CEP: '.$cep[$aux2] ?></li>	<!--
				<li class="list-group-item"><b>Cep:</b> <?php echo $cep[$aux2] ?></li>
				<li class="list-group-item"><b>Bairro:</b> <?php echo $bairro[$aux2] ?></li>
				<li class="list-group-item"><b>Cidade:</b> <?php echo $cidade[$aux2] ?></li>	-->
				<li class="list-group-item"><b>Email:</b> <?php echo $email_contato[$aux2] ?></li>
				<li class="list-group-item"><b>Telefone:</b> <?php echo $tel_contato[$aux2] ?></li>
				<li class="list-group-item"><b>Preco:</b> R$ <?php echo $preco[$aux2] ?></li>
			  </ul>
			  <div class="card-body">
				<a href="detalhes?id=<?php echo $id_imovel[$aux2]?>" class="card-link">Detalhes</a>
			  </div>
			</div>
	</div>

		<?php
		$aux2++;
		}
		?>
	<?php
	}
	?>
	</div>
</div>