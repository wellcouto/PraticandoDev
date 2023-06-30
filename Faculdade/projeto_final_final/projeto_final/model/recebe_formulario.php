<?php 
require("../conn/conn.php");

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$estadoCivil = $_POST['estadoCivil'];
$sexo = $_POST['sexo'];
$comentarios = $_POST['comentarios'];

if(empty($nome) || empty($email) || $idade==null || empty($endereco)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {

	$cad_usuario = $pdo->prepare("INSERT INTO tbl_usuario (cpf,nome, email, senha, idade, endereco, telefone, estadoCivil, sexo, comentarios) VALUES (:cpf,:nome, :email, :senha, :idade, :endereco, :telefone,:estadoCivil,:sexo,:comentarios)");
	$cad_usuario->execute(array(
		':cpf' => $cpf,
		':nome' => $nome,
		':email' => $email,
		':senha' => $senha,
		':idade' => $idade,
		':endereco' => $endereco,
		':telefone' => $telefone,
		':estadoCivil' => $estadoCivil,
		':sexo' => $sexo,
		':comentarios' => $comentarios,
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Usuario Cadastrado com Sucesso!',
  	'success'
)</script>";

}

?>

