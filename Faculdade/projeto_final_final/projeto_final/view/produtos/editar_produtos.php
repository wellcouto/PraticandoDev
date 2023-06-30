<?php 

include "../../conn/conex.php";
include "../restrito_admin.php";


$id = $_REQUEST['id'];

	if($id != null)
{
	 $id = $_REQUEST['id'];

}else 
{

	header("Location: index.php");
}

	$sql = $pdo->prepare("SELECT * FROM `tbl_produto` where id = :id");
	$sql->bindParam(':id', $id);
	$sql->execute();
	$restabela = $sql->rowCount();
	$rowtabela = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="editar_produtos.css">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form action="../../controller/atualizar/atualizar_produto.php" method="POST" id="formulario" enctype="multipart/form-data" class='form'>
            <div class='containerInput'>
                <input id="nome" name="nome" type="text" class='input' placeholder='Digite o nome do produto' value="<?= $rowtabela['nome'] ?>"  required/>
            </div>
            <div class='containerInput'>
                <input id="valor" name="valor" type="number" step="any" class='input' placeholder='Digite o valor do produto' value="<?= $rowtabela['valor'] ?>" required />
            </div>  
            <div class='containerFile'>
                <label htmlFor="saloonImage">Selecione uma foto para o salão</label>
                <input class="file"  name="imagem" id="imagem" type='file' class='input' value="<?= $rowtabela['imagem']?> " />
                <img class="imageFile" src="<?= $rowtabela['imagem'] ?>" alt="">
            </div>
            <input type="hidden" name="id" id="id" value="<?= $rowtabela['id'] ?>">

            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class="button" href="./listar_produtos.php">Voltar ←</a>
            </div>
        </form>
        <div id="linkResultado"></div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script>
             jQuery('#formulario').submit(function () {
        event.preventDefault();
        var dados = new FormData(jQuery(this)[0]);

        jQuery.ajax({
            type: "POST",
            url: jQuery(this).attr('action'),
            data: dados,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#linkResultado").html(data);
            }
        });

        return false;
    });

	</script>
</body>
</html>
</body>


</html>