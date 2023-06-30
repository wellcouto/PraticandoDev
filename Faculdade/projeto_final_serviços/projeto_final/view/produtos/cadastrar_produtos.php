<?php
include "../restrito_admin.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cadastrar_produtos.css">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form action="../../controller/cadastrar/recebe_produto.php" method="POST" id="formulario" enctype="multipart/form-data"
            class='form'>
            <div class='containerInput'>
                <input id="nome" name="nome" type="text" class='input' placeholder='Digite o nome do produto' required />
            </div>
            <div class='containerInput'>
                <input id="valor" name="valor" type="number" step="any" class='input' placeholder='Digite o valor do produto' required />
            </div>
            <div class='containerFile'>
                <label htmlFor="saloonImage">Selecione uma foto para o salão</label>
                <input id='saloonImage' type='file' class="file"  name="imagem"  class='input' required />
            </div>


            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class="button" href="../home/home_admin.php">Voltar ←</a>
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