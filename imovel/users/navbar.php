<nav class="navbar navbar-default">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Imobiliaria</a>
		</div>
		
		<ul class="nav navbar-nav">
		<?php
		//var_dump($srow);
		if($srow['tipo'] == 'Senhorio'){
			echo '<li><a href="../users/adicionar_imovel.php"><span class="glyphicon glyphicon-home"></span> Criar anuncio</a></li>';
			echo '<li><a href="../users/editar_anuncio.php"><span class="glyphicon glyphicon-home"></span> Editar anuncio</a></li>';
			echo '<li><a href="../users/reclamacoes.php"><span class="glyphicon glyphicon-home"></span> Reclamacoes</a></li>';
			echo '<li><a href="../users/relatorio.php"><span class="glyphicon glyphicon-home"></span> Relatorio</a></li>';}
			else{
			echo '<li><a href="../users/boleto.php"><span class="glyphicon glyphicon-home"></span> Segunda via de boleto</a></li>';
			echo '<li><a href="../users/relatorio_aluguel.php"><span class="glyphicon glyphicon-home"></span> Relatorio de alugueis pagos</a></li>';
			echo '<li><a href="../users/reclamar.php"><span class="glyphicon glyphicon-home"></span> Reclamar</a></li>';
			}
			?>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?></a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
						<li><a href="#photo" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Photo</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
			</li>
		</ul> 
    </div>
</nav>