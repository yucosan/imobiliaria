<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
		<div class="container">
				<div style="text-align: center;">
<?php
//var_dump($_POST);
$id_imovel = $_GET['id'];

	$stmt = $pdo->prepare("SELECT * from imovel where id_imovel = ?;");

	$stmt -> execute([$id_imovel]);

	$data = $stmt->fetchAll();
	?>
				<div class="container" id="casas">

					<div class="card card-block" style="color:black;margin:2em auto 4em auto">
								<?php
								$aux2 = 0;
								if ($data) {
								?>
									<div class="row equal" style="height: ;">
										<?php
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
													$imagem2[$aux2] = $data[$aux2]["imagem2"];
													$imagem3[$aux2] = $data[$aux2]["imagem3"];
										?>
										
										<div class="col-12 col-sm-12  col-md-6 col-lg-4">
											<div class="card" style="width: 18rem; margin-top: 3rem;">
											  <img class="card-img-top" style="height: 140px" src="<?php echo 'data:image/jpeg;base64,'.$imagem1[$aux2] ?>" alt="Card image cap">
											<?php if($imagem2[$aux2] != NULL){?><img class="card-img-top" style="height: 140px" src="<?php echo 'data:image/jpeg;base64,'.$imagem2[$aux2] ?>" alt="Card image cap"><?php }?>
											<?php if($imagem3[$aux2] != NULL){?><img class="card-img-top" style="height: 140px" src="<?php echo 'data:image/jpeg;base64,'.$imagem3[$aux2] ?>" alt="Card image cap"><?php }?>
											  <div class="card-body">
												<h5 class="card-title"> <?php echo $tipo[$aux2] ?></h5><!--
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
											  <?php if($srow['tipo'] == 'Inquilino'){ ?>
												<a href="alugar.php?id=<?php echo $id_imovel[$aux2]?>" class="card-link">Alugar</a>
											  <?php } ?>
											  </div>
											</div>
									</div>
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