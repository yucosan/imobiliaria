<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
		<div class="container">
				<div style="text-align: center;">
<?php

	if($srow['tipo'] == 'Senhorio')
	{
	$stmt = $pdo->prepare("SELECT * from imovel where id_responsavel = ?;");

	$stmt -> execute([$srow['id_usuario']]);
	
	$data = $stmt->fetchAll();

	$result = $stmt->rowcount();
	
	if ($result<2)
	echo "Responsavel por ".$result." imovel";
	else
	echo "Responsavel por ".$result." imoveis";
}
 else
{	
	$stmt = $pdo->prepare("SELECT * from imovel where disponivel = true;");

	$stmt -> execute();

	$data = $stmt->fetchAll();

	$result = $stmt->rowcount();
	
	if ($result<2)
	echo "Existe ".$result." imovel disponivel";
else
	echo "Existem ".$result." imoveis disponiveis";
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
											  <img class="card-img-top" style="height: 140px" src="<?php echo 'data:image/jpeg;base64,'.$imagem1[$aux2] ?>" alt="Card image cap">
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
		</div>

<?php include('password_modal.php'); ?>
<?php include('out_modal.php'); ?>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
	$('#chatRoom').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});
	
	$('#myChatRoom').DataTable({
	"sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
	"bLengthChange": false,
	"bInfo": false,
	"bPaginate": true,
	"bFilter": false,
	"bSort": false,
	"pageLength": 8
	});
	
	$(document).on('click', '.join_chat', function(){
		var cid=$(this).val();
		if ($('#status'+cid).val()==1){
			window.location.href='chatroom.php?id='+cid;
		}
		else if ($('#status'+cid).val()==2){
			$('#join_chat').modal('show');
			$('.modal-body #chatid').val(cid);
		}
		else{
			$.ajax({
				url:"addmember.php",
				method:"POST",
				data:{
					id: cid,
                    
				},
				success:function(){
				window.location.href='chatroom.php?id='+cid;
				}
			});
		}
	});
	
	$(document).on('click', '#addchatroom', function(){
		chatname=$('#chat_name').val();
		if($('#chat_password').val()){
			chatpass=$('#chat_password').val();
		}else{
			chatpass="";
		}
			$.ajax({
				url:"add_chatroom.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
					window.location.href='chatroom.php?id='+data;
				}
			});
		
	});
	//
	$(document).on('click', '.delete2', function(){
		var rid=$(this).val();
		$('#delete_room2').modal('show');
		$('.modal-footer #confirm_delete2').val(rid);
	});
	
	$(document).on('click', '#confirm_delete2', function(){
		var nrid=$(this).val();
		$('#delete_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(dados){
					console.log(dados);
					window.location.href='index.php';
				}
			});
	});
	
	$(document).on('click', '.leave2', function(){
		var rid=$(this).val();
		$('#leave_room2').modal('show');
		$('.modal-footer #confirm_leave2').val(rid);
	});
	
	$(document).on('click', '#confirm_leave2', function(){
		var nrid=$(this).val();
		$('#leave_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"leaveroom.php",
				method:"POST",
				data:{
					chatid: nrid,
					leave: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
 
});
</script>	
</body>
</html>