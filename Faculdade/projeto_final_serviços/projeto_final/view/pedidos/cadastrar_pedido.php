
<?php 
require("../../conn/conex.php");

session_start();
$usuario = $_SESSION['email'];
if(!isset($_SESSION['email']) or $_SESSION['tipo'] !== "usuario"){
    header('location:../index.php');
    exit; // Adicione esta linha para interromper a execução do script após o redirecionamento
  }

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
    <link rel="stylesheet" href="cadastrar_pedido.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form action="../../controller/cadastrar/recebe_pedido.php" method="POST" id="formulario"
            class='form'>
            <div class='containerInput'>
                <input name="produto" id="produto" type="hidden" class='input' value="<?= $id ?>" required  />
            </div>
            <div class='containerInput'>
            <input type="text" class="input" value="<?php echo $rowtabela['nome']; ?>" readonly  />
            </div>
            <div class='containerInput'>
                <input name="usuario" id="usuario" type="text" class='input' value="<?= $usuario ?>" readonly  />
            </div>
            <div class='containerInput'>
                <input name="quantidade" step="1" id="quantidade" type="number" class='input' placeholder='Digite a quantidade a ser comprada' />
            </div>
            <input id="latitude" name="latitude" type="hidden" value="0"/>
            <input id="longitude" name="longitude" type="hidden" value="0"/>
            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class='button back' href='../produtos/listar_produtos_comprar.php'>Voltar ←</a>
            </div>
        </form>
        <div id="linkResultado"></div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showExactPosition)
            
            function showExactPosition(position){
                var latitude = position.coords.latitude
                var longitude = position.coords.longitude
                const inputLatitude = document.getElementById("latitude")
                inputLatitude.value = latitude
                const inputLongitude = document.getElementById("longitude")
                inputLongitude.value = longitude
            }
            }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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