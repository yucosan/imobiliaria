<!DOCTYPE html>
			<?php
			include('/session.php');
			?>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Imobiliaria</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        </head>
    <body>
		<div class="jumbotron">
		<h1 style="text-align: center;">Adicionar Imóvel</h1>
		<div class="container">

			<form method="POST" enctype="multipart/form-data">
				<div class="row"style="text-align: center;">
				<div class="col">
						<label>Numero de quartos:</label><br><input type="text" name="n_quartos" id="n_quartos"><br>
						<label>Numero de banheiros:</label><br><input type="text" name="n_banheiros" id="n_banheiros"><br>
						<label>Area:</label><br><input type="text" name="area" id="area"><br>
						<label>CEP:</label><br><input type="text" name="cep" id="cep"><br>
						<label>Rua:</label><br><input type="text" name="rua" id="rua"><br>
						<label>Bairro:</label><br><input type="text" name="bairro" id="bairro"><br>
						<label>Cidade:</label><br><input type="text" name="cidade" id="cidade"><br>
						<label>Preco:</label><br><input type="text" name="preco" id="preco"><br>
						<label>Tipo:</label><br>
						<input type="checkbox" name="tipo" value="casa"> Casa
						<input type="checkbox" name="tipo" value="apartamento"> Apartamento<br>

						<label>	Select image to upload:</label><br>
						<input type="file" name="imagem1" id="imagem1"/>
						<input type="file" name="imagem2" id="imagem2"/>
						<input type="file" name="imagem3" id="imagem3"/>
				</div>
				</div>
			</div>

				<div style="text-align: center;"><br>
						<input type="submit" value="Enviar" class="btn btn-primary" id="enviar" name="enviar" formaction="envio.php">
				</div>
			</form>
		</div>
		</div>
    </body>
</html>
