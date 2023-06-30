<?php 

include "../../conn/conex.php";
include "../restrito_usuario.php";


$id = '';
error_reporting(E_ERROR | E_PARSE);

if($_REQUEST['id'] != null){
    $id = $_REQUEST['id'];

}
else{
    session_start();
    $email = '';

    if($_SESSION['email'] != null){
        $email = $_SESSION['email'];
    
    }
    else {

	header("Location: index.php");
}


}

	
    if($id != null) {
        $sql = $pdo->prepare("SELECT * FROM `tbl_usuario` where id = :id");
        $sql->bindParam(':id', $id);
    }
    else{
        $sql = $pdo->prepare("SELECT * FROM `tbl_usuario` where email = :email");
        $sql->bindParam(':email', $email);
    }
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
    <link rel="stylesheet" href="editar_pessoas.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form id="formulario" class='form'>
            <div class='containerInput'>
                <input name="email" id="email" type="text" class='input' placeholder='Digite seu email' value="<?= $rowtabela['email'] ?>" readonly />
            </div>
            <div class='containerInput'>
                <input name="nome" id="nome" type="text" class='input' placeholder='Digite seu nome' value="<?= $rowtabela['nome'] ?>" required />
            </div>
            <div class='containerInput'>
                <input name="telefone" id="telefone" type="text" class='input' placeholder='Digite seu telefone' value="<?= $rowtabela['telefone'] ?>" required />
            </div>
            <div class='containerInput'>
                <input name="idade" id="idade" type="text" class='input' placeholder='Digite sua idade' value="<?= $rowtabela['idade'] ?>"  required/>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $rowtabela['id'] ?>" required>
            <select value="<?= $rowtabela['sexo'] ?>" name="sexo"  name="sexo">
            <option value="<?= $rowtabela['sexo'] ?>"><?= $rowtabela['sexo'] ?></option>
                <?php
                    if($rowtabela['sexo'] == 'masculino'){
                        echo "<option value='feminino'>feminino</option>" ;
                    }
                    else{
                        echo "<option value='masculino'>masculino</option>" ;

                    }
                 ?>
            </select >
                <div class='containerInput'>
                    <input id="endereco" name="endereco" type="text" class='input' placeholder='Endereço' value="<?= $rowtabela['endereco'] ?>" required />
                </div>
            <div class='containerInput'>
                <input id="senha" name="senha" type="password" class='input' placeholder='Digite sua senha' value="<?= $rowtabela['senha'] ?>" required />
            </div>
            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class="button" href="../../view/home/home_usuario.php">Voltar ←</a>
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
				url: "../../controller/atualizar/atualizar_usuario.php",
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