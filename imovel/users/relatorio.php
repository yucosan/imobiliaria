<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
	<div class="container">
		<div style="text-align: center;">
<?php

	$stmt = $pdo->prepare("SELECT * from contrato where id_proprietario = ?;");

	$stmt -> execute([$srow['id_usuario']]);
	
	$data = $stmt->fetchAll();
	
	$valor_total = 0;
	
	$result = $stmt->rowcount();
	
	if ($result<2)
	echo $result." imovel alugado";
	else
	echo $result." imoveis alugados";

?>
			<div class="container" id="casas">

				<div class="card card-block" style="color:black;margin:2em auto 4em auto">
				<?php
				$aux2 = 0;
				if ($data) {
				?>
					<div class="row equal" style="height: ;">
					<?php
					while ($aux2 < $result) {
						$id_imovel[$aux2] = $data[$aux2]["id_imovel"];
						$id_proprietario[$aux2] = $data[$aux2]["id_proprietario"];
						
						$valor[$aux2] = $data[$aux2]["valor"];
						$valor_total = $valor_total + $valor[$aux2];
						
						$stmt = $pdo->prepare("SELECT rua, cidade, bairro, cep from imovel where id_imovel = ?;");

						$stmt -> execute([$id_imovel[$aux2]]);
						
						$data2 = $stmt->fetchAll();
						
					?>	
					<div class="col-12 col-sm-12  col-md-6 col-lg-4">
						<div class="card" style="width: 18rem; margin-top: 3rem;">
						 <div class="card-body">
							<h5 class="card-title"></h5><!--
							<p class="card-text">Blablabla</p> -->
						  </div>
						  <ul class="list-group list-group-flush">
							<li class="list-group-item"><b>ID do Imovel:</b> <?php echo $id_imovel[$aux2] ?></li>
							<li class="list-group-item"><b>Endereco:</b> <?php echo $data2[0]['rua']. '<br>'. $data2[0]['cidade'] .' , '.$data2[0]['bairro'] .'<br>'.' CEP: '.$data2[0]['cep'] ?></li>
							<li class="list-group-item"><b>Valor:</b> R$ <?php echo $valor[$aux2] ?></li>
						  </ul>
						  <div class="card-body">
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
					<br><b>Valor Total: R$ <?php echo $valor_total ?></b>

				</div>
			</div>
		</div>
	</div>
<?php include('password_modal.php'); ?>
<?php include('out_modal.php'); ?>
<?php include('modal.php'); ?>

</body>
</html>