<?php 

require("../../conn/conex.php");

$produto = $_POST['produto'];
$email = $_POST['email'];
$quantidade = $_POST['quantidade'];
$id = $_POST['id'];


$sql = $pdo->prepare("SELECT * FROM `tbl_produto` where id = :produto");
	$sql->bindParam(':produto', $produto);
	$sql->execute();
	$restabela = $sql->rowCount();
	$rowtabela = $sql->fetch(PDO::FETCH_ASSOC);

if($produto == null || empty($email) || $quantidade==null){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {

	$atualizar = $pdo->prepare("UPDATE tbl_compra SET id_produto = :produto, email = :email, total = :total where id = :id");
	$valorfinal = number_format($quantidade * $rowtabela['valor'], 2); 
	$valorFinalString = strval($valorfinal);
	$valorFinalString = str_replace(",","", $valorFinalString);
	$valorfinal = $valorFinalString;
	echo $valorfinal;

	$atualizar->execute(array(
		':produto' => $produto,
		':email' => $email,
		':total' => $valorfinal,
		':id' => $id
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Atualizado com Sucesso!',
  	'success'
).then(()=>{
	window.location.href='../pedidos/listar_pedidos_admin.php';
})</script>";

}

?>