<!DOCTYPE html>
<html>
	<?php
	include "db.php";
	?>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Imobiliaria</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        </head>
    <body>
		<div class="jumbotron">
		<h1 style="text-align: center;">Imobiliaria</h1>
		<div class="container">

		<form method="POST" action="pagina_login.php">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> No account? <a href="signup.php"> Sign up</a>
		</form>
		<div style="height: 10px;"></div>
			<div class="row" style="text-align:center;">
				<div class="col" style="text-align:center; border:2px solid black;border-radius: 10px;">
						<div style="height: 10px;text-align: center;">
							Bairro: <input type="text" placeholder="Bairro.." id="bairro" name="bairro" value="">
							Tipo: <select class=" contact-form__input contact-form__input--select" id="tipo" name="tipo">
							<option> Casa</option>
							<option> Apartamento</option>
							</select>
						</div>
						<br>
						<a href="" id="avancada" class="card-link busca-avancada">Busca avançada</a>
						<div id="div-busca-avancada" style="display:none">
							Numero de quartos: <input type="text" placeholder="" id="n_quartos" name="n_quartos">
							Valor min: <input type="text" placeholder="" id="valor_min" name="valor_min">
							Valor max: <input type="text" placeholder="" id="valor_max" name="valor_max">
							Area: <input type="text" placeholder="" id="area" name="area">
						</div>
						<button type="button" id ="buscar"class="btn btn-primary">Buscar </button>
						<br><br>

				</div>
			</div>
				
				<div style="height: 10px;"></div>
		</div>
			<form method="POST" >
				<div style="text-align: center;">
<?php

	$stmt = $pdo->prepare("SELECT * from imovel WHERE disponivel = true;");

	$stmt -> execute();

	$data = $stmt->fetchAll();

	$result = $stmt->rowcount();
	
	if ($result<2)
	{?>
	<div id="resultado">Existe <?php echo $result?> imovel disponivel</div>
	<?php
	}
	else
	{
	?>
	<div id="resultado">Existem <?php echo $result?> imoveis disponiveis</div>
	<?php
	}
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

					
			</div>

				</div>
			</form>
		</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	$('#buscar').on('click', function() {
	  $('#resultado').hide();
		$.ajax({
			type: "POST",
			url: 'mostrarcasas.php',
			data: 
			{ 
				bairro: $('#bairro')[0].value,
				tipo: $('#tipo')[0].value,
				n_quartos: $('#n_quartos')[0].value,
				valor_min: $('#valor_min')[0].value,
				valor_max: $('#valor_max')[0].value,
				area: $('#area')[0].value		
			},
			success: function(result){
				$("#casas").html(result);
			}
		});
	});
	
	$('#avancada').on('click', function() {
		event.preventDefault();
		$('#div-busca-avancada').toggle();
		console.log("ava");
	}); 
});
</script>

    </body>
</html>
