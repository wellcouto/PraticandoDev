<?php 
require("../../conn/conex.php");

$produto = $_POST['produto'];
$usuario = $_POST['usuario'];
$quantidade = $_POST['quantidade'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql = $pdo->prepare("SELECT * FROM `tbl_produto` where id = :produto");
	$sql->bindParam(':produto', $produto);
	$sql->execute();
	$restabela = $sql->rowCount();
	$rowtabela = $sql->fetch(PDO::FETCH_ASSOC);

$valorfinal = number_format($quantidade * $rowtabela['valor'], 2); 
$valorFinalString = strval($valorfinal);
	$valorFinalString = str_replace(",","", $valorFinalString);
	$valorfinal = $valorFinalString;
	echo $valorfinal;



if(empty($produto)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher o campo produto',
  	'error'
)</script>";
	die;
}else {

	$cad_usuario = $pdo->prepare("INSERT INTO tbl_compra (id_produto, email, total,latitude,longitude) VALUES (:produto, :usuario, :valorfinal,:latitude,:longitude)");
	$cad_usuario->execute(array(
		':produto' => $produto,
		':usuario' => $usuario,
		':valorfinal' => $valorfinal,
		':latitude' => $latitude,
		':longitude' => $longitude
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Produto Cadastrado com Sucesso!',
  	'success'
).then(()=>{
	window.location.href='../produtos/listar_produtos_comprar.php';
})</script>";

}

?>