<?php
require("../../conn/conex.php");

$nome = $_POST['nome'];
$valor = $_POST['valor'];

// Verificar se todos os campos foram preenchidos
if (empty($nome) || empty($valor)) {
    echo "<script>Swal.fire(
        'Erro',
        'Todos os campos devem ser preenchidos',
        'error'
    )</script>";
    die;
} else {
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
            
            $sql = $pdo->prepare("SELECT * FROM `tbl_produto` where nome = :nome");
            $sql->bindParam(':nome', $nome);
            $sql->execute();
            $restabela = $sql->rowCount();
                if($restabela > 0) {
                    echo "<script>Swal.fire(
                        'Erro',
                        'Produto com mesmo nome já cadastrado',
                        'error'
                  )</script>";
                      die;
                }	
                
            $cad_produto = $pdo->prepare("INSERT INTO tbl_produto (nome, valor, imagem) VALUES (:nome, :valor, :imagem)");
            $cad_produto->execute(array(
                ':nome' => $nome,
                ':valor' => $valor,
                ':imagem' => $caminhoCompleto
            ));

            echo "<script>Swal.fire(
                'Bom trabalho!',
                'Produto cadastrado com sucesso!',
                'success'
            ).then(()=>{
                window.location.href = '../produtos/listar_produtos.php';
            })</script>";
        } else {
            echo "<script>Swal.fire(
                'Erro',
                'Ocorreu um erro ao fazer o upload da imagem',
                'error'
            )</script>";
        }
    } else {
        echo "<script>Swal.fire(
            'Erro',
            'Ocorreu um erro ao fazer o upload da imagem',
            'error'
        )</script>";
    }
}
?>
