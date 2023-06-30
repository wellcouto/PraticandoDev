<?php
include "../../conn/conex.php";
include "../restrito_admin.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="listar_pessoas.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Lista de Clientes</title>
    <style>
           @media screen and (max-width:1024px){
    .containerItem {
        width: 80% !important;
    }

    @media screen and (max-width:524px){
    .containerItem {
        width: 100% !important;
    }
}
@media screen and (max-width:425px){
    .info {
        font-size: 2.8rem;
    }
}
    
}
    </style>
</head>
<body>

<div class="containerPage">

	<main>
        <h1 class="my-4">Lista de Usuários</h1>
        <a class='button back' href='../home/home_admin.php'>Voltar ←</a>

                <?php
                   
        
                    // Query para selecionar os dados da tabela
                    $sql = $pdo->prepare("select * from tbl_usuario");
                    $result = $sql->execute();
                    $rowtabela = $sql->fetchAll(); 
                    foreach($rowtabela as $row){
                        if ($sql->rowCount() > 0) {
                            echo" <div class='containerItem'>
                                    <div class='text'>
                                        <div class='infoTextContainer'>
                                        <p class='info'>Nome: " . $row['nome'] . "</p>
                                        </div>
                                        <div class='infoTextContainer'>
                                        <p class='info'>Email: " . $row['email'] . "</p>
                                        </div>
                                        <div class='infoTextContainer'>
                                        <p class='info'>Idade: " . $row['idade'] . "</p>
                                        </div>
                                        <div class='infoTextContainer'>
                                        <p class='info'>Endereço: " . $row['endereco'] . "</p>
                                        </div>
                                        <div class='infoTextContainer'>
                                        <p class='info'>Telefone: " . $row['telefone'] . "</p>
                                        </div>
                                    </div>
                                    <div class='buttons'>
                                        <a class='delete' href='deletar_usuario.php?id=" . $row["id"] . "' ><i class='fas fa-trash'>Deletar</i></a>
                                        <a class='edit' href='editar_pessoas_pelo_admin.php?id=" . $row["id"] . "' ><i class='fas fa-edit'>Editar</i></a>
                                    </div>
                                </div>";
                    }  else {
                        echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
                    }
                }
        
                    
                    ?>

    </main>
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
                    url: '../../controller/deletar/deletar_usuario.php',
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
