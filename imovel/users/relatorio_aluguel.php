<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
		<div class="container">
				<div style="text-align: center;">
<?php

	$stmt = $pdo->prepare("SELECT * from contrato where id_inquilino = ?;");

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
										while ($aux2 < $stmt->rowcount()) {
													$id_imovel[$aux2] = $data[$aux2]["id_imovel"];
													$id_proprietario[$aux2] = $data[$aux2]["id_proprietario"];
													
													$valor[$aux2] = $data[$aux2]["valor"];
													$valor_total = $valor_total + $valor[$aux2];
													
													$stmt = $pdo->prepare("SELECT * from cliente where id_usuario = ?;");

													$stmt -> execute([$id_proprietario[$aux2]]);
													
													$data2 = $stmt->fetchAll();
										?>
										ID do Imovel: <?php echo $id_imovel[$aux2] ?><br>
										Proprietario: <?php echo $data2[0]['nome_completo'] ?><br>
										Email: <?php echo $data2[0]['email_contato'] ?><br>
										Telefone: <?php echo $data2[0]['tel_contato'] ?><br>
										Valor: R$ <?php echo $valor[$aux2] ?><br>
										<?php
										$aux2++;
										}
										?>
										<br><b>Valor Total: R$ <?php echo $valor_total ?></b>
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