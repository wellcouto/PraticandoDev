<?php
include "../conn/conex.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Lista de Clientes</title>
</head>

<body>

<div class="container">

	<h1 class="my-4">Lista de Usuários</h1>
 		<table class="table table-striped">
 		<thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Idade</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
           

            // Query para selecionar os dados da tabela
            $sql = $pdo->prepare("select * from tbl_usuario");
            $result = $sql->execute();
            $rowtabela = $sql->fetchAll(); 
            if ($sql->rowCount() > 0) {
              foreach ($rowtabela as $row){
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["senha"] . "</td>";
                    echo "<td>" . $row["idade"] . "</td>";
                    echo "<td>" . $row["endereco"] . "</td>";
                    echo "<td>" . $row["telefone"] . "</td>";
                    echo "<td>";
                    echo "<a href='form_edit2.php?id=".$row["id"]."' class='btn btn-primary btn-sm'><i class='fas fa-edit'>Editar</i></a> ";
                    echo "<a href='excluir.php?id=".$row["id"]."' class='btn btn-danger' ><i class='fas fa-trash'>Deletar</i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
            }

            
            ?>
        </tbody>
    </table>
</div>

<div id="confirm-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação de exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  
  $(document).ready(function() {
    $('a.btn-danger').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('href').split('=')[1];
        $('#confirm-modal').modal('show').one('click', '#confirm-delete', function() {
            $.ajax({
                url: '../controller/deletar_usuario.php',
                type: 'GET',
                data: { id: id },
                success: function() {
                    location.reload();
                },
                error: function() {
                    alert('Erro ao excluir registro.');
                }
            });
        });
    });
});

</script>
</body>
</html>
