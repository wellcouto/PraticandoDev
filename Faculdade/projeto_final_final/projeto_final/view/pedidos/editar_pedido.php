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

	$sql = $pdo->prepare("SELECT * FROM `tbl_compra` where id = :id");
	$sql->bindParam(':id', $id);
	$sql->execute();
	$restabela = $sql->rowCount();
	$rowtabelaPedido = $sql->fetch(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT * FROM `tbl_produto` where id = :id");
	$sql->bindParam(':id', $rowtabelaPedido['id_produto']);
	$sql->execute();
	$restabela = $sql->rowCount();
	$rowtabelaProduto = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar_pedido.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form id="formulario" class='form'>
            <div class='containerInput'>
                <input name="id" id="id" type="hidden" class='input' value="<?= $id ?>" required  />
            </div>
            <div class='containerInput'>
            <input name="produto" id="produto" type="hidden" class='input' value="<?= $rowtabelaPedido['id_produto'] ?>" required  />

            <input type="text" class="input" name="nome" id="nome" value="<?= $rowtabelaProduto['nome'] ?>" readonly required />

            </div>
            <div class='containerInput'>
                <input name="email" id="email" type="text" name="email" class='input' value="<?= $rowtabelaPedido['email'] ?>" readonly required />
            </div>
            <div class='containerInput'>
                <input name="quantidade" id="quantidade" type="number" step="1" class='input' value="<?= round($rowtabelaPedido['total']/$rowtabelaProduto['valor']); ?>" placeholder='Digite a quantidade a ser comprada' />
            </div>
            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class='button back' href='./listar_pedidos_admin.php'>Voltar ←</a>
            </div>
        </form>
        <div id="linkResultado"></div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
		jQuery('#formulario').submit(function () {
			event.preventDefault();
			var dados = jQuery(this).serialize();

			jQuery.ajax({
				type: "POST",
				url: "../../controller/atualizar/atualizar_pedido.php",
				data: dados,
				success: function (data)
				{
					$("#linkResultado").html(data);
				}
			});

			return false;
		});


	</script>
</body>

</html>