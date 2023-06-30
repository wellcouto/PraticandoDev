<?php
include "../../conn/conex.php";
include "../restrito_usuario.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listar_produtos_comprar.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class='containerPage'>
        <header>
            <img class='logo' src='../../assets/logo.png' alt="Logo" />
            <nav>
                <div class='desktopMenu'>
                    <a href="../home/home_usuario.php">Home</a>
                </div>
            </nav>
        </header>
        <main>
            <h1 class='title'>Catálogo de Produtos</h1>
            <div class='itens'>
                <?php
                // Query para selecionar os dados da tabela
                $sql = $pdo->prepare("select * from tbl_produto");
                $result = $sql->execute();
                $rowtabela = $sql->fetchAll();
                if ($sql->rowCount() > 0) {
                    foreach ($rowtabela as $row) {
                        echo" <div class='containerItem'>
                        <img class='imagem' src='" . $row["imagem"] . "' alt='Batom' />
                        <div class='text'>
                            <h2>" . $row['nome'] . "</h2>
                            <h3>R$" . $row['valor'] . "</h3>
                        </div>
                        <div class='buttons'>
                            <a class='button buy' href='../pedidos/cadastrar_pedido.php?id=" . $row["id"] . "' >Comprar →</a>
                        </div>
                    </div>";
                    }
                } 
                ?>
                </div>
            </div>
            
            <div id="confirm-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h2 class='title'>Confirmação de Exclusão</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class='title'>Deseja realmente excluir este registro?</h3>
            </div>
            <div class="modal-footer">
                <button id="confirm-delete" type="button" class='button'>
                     Deletar →
                </button>
                <button data-dismiss="modal" type="button" class='button'>
                    Voltar ←
                </button>
            </div>
        </div>
    </div>
</div>


        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        $('a.delete').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('href').split('=')[1];
            $('#confirm-modal').modal('show').one('click', '#confirm-delete', function () {
                $.ajax({
                    url: '../../controller/deletar/deletar_produto.php',
                    type: 'GET',
                    data: { id: id },
                    success: function () {
                        location.reload();
                    },
                    error: function () {
                        alert('Erro ao excluir registro.');
                    }
                    });
                });
            });
        });
</script>
</body>

</html>