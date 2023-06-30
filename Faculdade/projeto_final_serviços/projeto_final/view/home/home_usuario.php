<?php 
include "../restrito_usuario.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class='form'>
        <div class='containerPage'>
            <h1 class='titulo'>O que deseja fazer?</h1>
            <div class='buttons'>
                <a class="button" href="../produtos/listar_produtos_comprar.php">Comprar Produto →</a>
                <a class="button" href="../pedidos/listar_pedidos_usuario.php">Listar Compras →</a>
            </div>
            <div class="buttons">
        
            <a class="button" href="../pessoas/editar_pessoas_usuario.php">Minha Conta →</a>
            <a class="button" href="../logout.php">Sair ←</a>
            </div>
        </div>
    </div>
</body>

</html>