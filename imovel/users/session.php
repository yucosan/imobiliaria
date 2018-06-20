<?php
	session_start();
	include('../db.php');
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}
	
	$stmt = $pdo->prepare("SELECT * FROM autenticacao WHERE id_usuario = ?;");

	$stmt -> execute([$_SESSION['id']]);
	
	$data = $stmt->fetchAll();
	$srow = $data[0];
	$user=$srow['nome'];
?>