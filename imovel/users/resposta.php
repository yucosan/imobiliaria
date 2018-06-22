<?php
	include('session.php');	
	$id_imovel = $_GET['id'];
	$reclamacao = $_GET['re'];
	include('header.php');
?>
<body>
	<div class="jumbotron">
		<h1 style="text-align: center;">Responder</h1>
			<div class="container">
				<form method="POST" enctype="multipart/form-data">
					<div class="row"style="text-align: center;">
						<br>
						<div class="col">
							<label>Escreva sua resposta:</label><br>
							<textarea type="text" name="resposta" id="resposta" style="margin: 5px; width: 1200px; height: 500px;"></textarea>
						</div>
					</div>
			</div>
				<div style="text-align: center;"><br>
					<input type="submit" value="Enviar" class="btn btn-primary" id="enviar" name="enviar" formaction="enviar_resposta.php?id=<?php echo $id_imovel?>&re=<?php echo $reclamacao?>">	
				</div>	
				</form>
	</div>
</body>
						