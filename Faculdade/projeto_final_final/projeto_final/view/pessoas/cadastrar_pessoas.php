
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar_pessoas.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class='containerPage'>
        <img class='logo' src='../../assets/logo.png' alt="GoBeleza" />
        <form id="formulario" class='form'>
            <div class='containerInput'>
                <input name="email" id="email" type="email" class='input' placeholder='Digite seu email' required />
            </div>
            <div class='containerInput'>
                <input name="nome" id="nome" type="text" class='input' placeholder='Digite seu nome' required />
            </div>
            <div class='containerInput'>
                <input name="telefone" id="telefone" type="text" class='input' placeholder='Digite seu telefone' required />
            </div>
            <div class='containerInput'>
                <input name="idade" id="idade" type="text" class='input' placeholder='Digite sua idade' required />
            </div>
            <select name="sexo" required>
                <option value='' hidden>Selecione seu sexo</option>
                <option value='masculino'>Masculino</option>
                <option value='feminino'>Feminino</option>
            </select >
                <div class='containerInput'>
                    <input id="endereco" name="endereco" type="text" class='input' placeholder='Endereço' required />
                </div>
            <div class='containerInput'>
                <input id="senha" name="senha" type="password" class='input' placeholder='Digite sua senha' required />
            </div>
            <div class='buttons'>
                <button type="submit" class="button">Confirmar →</button>
                <a class="button" class="link" href="../index.php">Voltar ←</a>
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
				url: "../../controller/cadastrar/recebe_usuario.php",
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