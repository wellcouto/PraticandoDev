<?php 

require("../../conn/conex.php");

$nome = $_POST['nome'];
$valor = $_POST['valor']; 	
$id = $_POST['id'];
if(empty($nome) || empty($valor)){
	echo "<script>Swal.fire(
  	'Erro',
  	'Você precisa preencher todos os campos',
  	'error'
)</script>";
	die;
}else {
    // Processar o upload da imagem
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeArquivo = $_FILES['imagem']['name'];
        $nomeTemporario = $_FILES['imagem']['tmp_name'];
        $diretorioDestino = '../../public/img/';

        // Verificar se o diretório de destino existe, caso contrário, criar o diretório
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        $caminhoCompleto = $diretorioDestino . $nomeArquivo;

        // Mover o arquivo temporário para o diretório de destino
        if (move_uploaded_file($nomeTemporario, $caminhoCompleto)) {
            // Arquivo foi movido com sucesso, agora podemos inserir os dados do produto no banco de dados

                
	$atualizar = $pdo->prepare("UPDATE tbl_produto SET nome = :nome, valor =:valor, imagem=:imagem where id = :id");
	$atualizar->execute(array(
		':nome' => $nome,
		':valor' => $valor,
		':imagem' => $caminhoCompleto,
		':id' => $id
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Atualizado com Sucesso!',
  	'success'
).then(()=>{
	window.location.href='../../view/produtos/listar_produtos.php';
})</script>";

} 
}else {
	$sql = $pdo->prepare("SELECT * FROM `tbl_produto` where nome = :nome");
        $sql->bindParam(':nome', $nome);
        $sql->execute();

	$atualizar = $pdo->prepare("UPDATE tbl_produto SET nome = :nome, valor =:valor where id = :id");
	$atualizar->execute(array(
		':nome' => $nome,
		':valor' => $valor,
		':id' => $id
	));

	echo "<script>Swal.fire(
		'Bom trabalho!',
		'Atualizado com Sucesso!',
		'success'
  ).then(()=>{
	window.location.href='../../view/produtos/listar_produtos.php';
})</script>";
}
	}


?>