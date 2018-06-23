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
	
	$result = $stmt->rowcount();
	
	if ($result<2)
	echo $result." imovel alugado";
	else
	echo $result." imoveis alugados";

?>
			<div class="container" id="casas">

				<div class="card card-block" style="color:black;margin:2em auto 4em auto">
				<?php
				$aux = 0;
				$aux2 = 0;
				if ($data) {
				?>
					<div class="row equal" style="height: ;">
					<?php
					while ($aux2 < $result) {
						$id_contrato[$aux2] = $data[$aux2]["id_contrato"];
						$id_imovel[$aux2] = $data[$aux2]["id_imovel"];
						$id_proprietario[$aux2] = $data[$aux2]["id_proprietario"];						
						$valor[$aux2] = $data[$aux2]["valor"];
						
						$stmt = $pdo->prepare("SELECT rua, cidade, bairro, cep from imovel where id_imovel = ?;");
						$stmt -> execute([$id_imovel[$aux2]]);						
						$data2 = $stmt->fetchAll();	
						
						$stmt5 = $pdo->prepare("SELECT * FROM reclamacao WHERE id_contrato = ?;");
						$stmt5 -> execute([$id_contrato[$aux2]]);	
						$data3 = $stmt5->fetchAll();
						
							while ($aux < $stmt5->rowcount()) {
								$reclamacao[$aux] = $data3[$aux]['reclamacao'];
								$resposta[$aux] = $data3[$aux]['resposta'];
								$aux++;
							}
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
							<li class="list-group-item"><b>Reclamacao:</b> <?php if(isset($reclamacao[$aux2])) echo $reclamacao[$aux2]; ?></li>
							<li class="list-group-item"><b>Resposta:</b> <?php if(isset($resposta[$aux2])) echo $resposta[$aux2]; ?></li>
						  </ul>
						  <div class="card-body">
							<a href="resposta?id=<?php echo $id_imovel[$aux2]?><?php if(isset($data3[$aux2]['id_reclamacao']))echo '
							&re='.$data3[$aux2]['id_reclamacao']?>" class="card-link">Responder reclamacao</a>
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
			</div>
		</div>
	</div>
<?php include('password_modal.php'); ?>
<?php include('out_modal.php'); ?>
<?php include('modal.php'); ?>

</body>
</html>