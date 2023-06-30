<?php 
require("../../conn/conex.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];


if(empty($nome) || empty($email) || $idade==null || empty($endereco) || empty($sexo)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {
	$sql = $pdo->prepare("SELECT * FROM `tbl_usuario` where email = :email");
	$sql->bindParam(':email', $email);
	$sql->execute();
	$restabela = $sql->rowCount();
	if($restabela > 0) {
		echo "<script>Swal.fire(
			'Erro',
			'Usuário já existente',
			'error'
	  )</script>";
		  die;
	}	
	else{
	$rowtabela = $sql->fetch(PDO::FETCH_ASSOC);
	$cad_usuario = $pdo->prepare("INSERT INTO tbl_usuario (nome, email, senha, idade, endereco, telefone,sexo,tipo) VALUES (:nome, :email, :senha, :idade, :endereco, :telefone,:sexo,:tipo)");
	$cad_usuario->execute(array(
		':nome' => $nome,
		':email' => $email,
		':senha' => $senha,
		':idade' => $idade,
		':endereco' => $endereco,
		':telefone' => $telefone,
		':sexo' => $sexo,
		':tipo' => "usuario"
	));
	}

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Usuario Cadastrado com Sucesso!',
  	'success'
).then(()=>{
	window.location.href = '../index.php';
})</script>";

}

?>

