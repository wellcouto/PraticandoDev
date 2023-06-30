<?php 

require("../conn/conex.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$id = $_POST['id'];

if(empty($nome) || empty($email) || $idade==null || empty($endereco)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {

	$atualizar = $pdo->prepare("UPDATE tbl_usuario SET nome = :nome, email = :email, senha =:senha, idade = :idade, endereco = :endereco, telefone = :telefone where id = :id");
	$atualizar->execute(array(
		':nome' => $nome,
		':email' => $email,
		':senha' => $senha,
		':idade' => $idade,
		':endereco' => $endereco,
		':telefone' => $telefone,
		':id' => $id
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Atualizado com Sucesso!',
  	'success'
)</script>";

}

?>