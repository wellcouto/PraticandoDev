<?php 
require("../conn/conex.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];


if(empty($nome) || empty($email) || $idade==null || empty($endereco)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {

	$cad_usuario = $pdo->prepare("INSERT INTO tbl_usuario (nome, email, senha, idade, endereco, telefone) VALUES (:nome, :email, :senha, :idade, :endereco, :telefone)");
	$cad_usuario->execute(array(
		':nome' => $nome,
		':email' => $email,
		':senha' => $senha,
		':idade' => $idade,
		':endereco' => $endereco,
		':telefone' => $telefone

	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Usuario Cadastrado com Sucesso!',
  	'success'
)</script>";

}

?>