<?php 

require("../../conn/conex.php");


$id = $_GET['id'];



	$atualizar = $pdo->prepare("DELETE FROM `tbl_usuario` WHERE `tbl_usuario`.`id` = :id");
	$atualizar->execute(array(
		
		':id' => $id
	));
	$atualizar = $pdo->prepare("DELETE FROM `tbl_compras`. WHERE `tbl_compras`.`id` = :id");
	$atualizar->execute(array(
		':id' => $id
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Deletado com Sucesso!',
  	'success'
)</script>";



?>