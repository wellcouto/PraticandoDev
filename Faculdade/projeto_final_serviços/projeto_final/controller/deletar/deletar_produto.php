<?php 

require("../../conn/conex.php");


$id = $_GET['id'];



	$atualizar = $pdo->prepare("DELETE FROM `tbl_produto` WHERE `tbl_produto`.`id` = :id");
	$atualizar->execute(array(
		
		':id' => $id
	));
	$atualizar = $pdo->prepare("DELETE FROM `tbl_compra` WHERE `id_produto` = :id");
	$atualizar->execute(array(
		
		':id' => $id
	));


	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Deletado com Sucesso!',
  	'success'
)</script>";



?>