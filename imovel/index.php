<!DOCTYPE html>
<html>
	<?php
	include "db.php";
	?>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Imoveis</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        </head>
    <body>
		<div class="jumbotron">
		<h1 style="text-align: center;">Imobiliaria</h1>
		<div class="container">

		<form method="POST" action="pagina_login.php">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> No account? <a href="signup.php"> Sign up</a>
		</form>
			<form method="POST" >
				<div class="row"style="text-align: center;">

				</div>
				<div style="text-align: center;">
<?php

	$stmt = $pdo->prepare("SELECT * from imovel where disponivel = true;");

	$stmt -> execute();

	$data = $stmt->fetchAll();

	$result = $stmt->rowcount();
	//var_dump($result);
	if ($result<2)
	echo "Existe ".$result." imovel disponivel";
else
	echo "Existem ".$result." imoveis disponiveis";
//falta colocar
//botoes drop down para filtrar resultados
//busca minima : apt vs casa e bairro/regiao
//busca avancada: dormitorios, valor min max, area
	?>
				<div class="container" id="casas">

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
											  <img class="card-img-top" src="<?php echo 'data:image/jpeg;base64,'.$imagem1[$aux2] ?>" alt="Card image cap">
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
												<a href="#" class="card-link">Detalhes</a>
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
			</form>
		</div>
		</div>

<script>
$(document).ready(function(){

         $.ajax({
             type: "POST",
             url: '/mostrarcasas.php',
             data:
			 {
			 },
             success: function(data) {
                 $('#casas').html(data);
             }
         });

});

    </body>
</html>
