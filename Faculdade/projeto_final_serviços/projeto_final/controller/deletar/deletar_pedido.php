<?php 

require("../../conn/conex.php");


$id = $_GET['id'];



	$atualizar = $pdo->prepare("DELETE FROM `tbl_compra` WHERE `tbl_compra`.`id` = :id");
	$atualizar->execute(array(
		
		':id' => $id
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Deletado com Sucesso!',
  	'success'
)</script>";



?>