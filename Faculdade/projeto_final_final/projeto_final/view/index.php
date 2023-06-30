<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
 <div class='containerPage'>
      <img class='logo' src="../assets/logo.png" alt="GoBeleza" />
      <form id="login-form" class='form'>
      <div class='containerInput'>
                <input id="login" type="email" class='input' placeholder='Digite seu email' required />
            </div>
            <div class='containerInput'>
                <input id="senha" type="password" class='input' placeholder='Digite sua senha' required />
            </div>     
        <button type="submit" class="button">Confirmar →</button>
        <div class='subText'>
            <a href="./pessoas/cadastrar_pessoas.php">Ainda não tem uma conta? Cadastre-se</a>
        </div>
      </form>
          <div id="message"></div>
    </div>
<script>
$(document).ready(function(){
  $("#login-form").submit(function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../controller/verifica_login.php",
      data: {
        login: $("#login").val(),
        senha: $("#senha").val(),
        submit: true
      },
      dataType: 'json',
      success: function(data){
        if(data.success){
          if (data.user_type === 'admin') {
            window.location.href = "home/home_admin.php";
          } else if (data.user_type === 'usuario') {
            window.location.href = "home/home_usuario.php";
          } else {
            $("#message").html("Tipo de usuário desconhecido");
          }
        } else {
          $("#message").html(data.message);
        }
      }
    });
  });
});
</script>

</body>
</html>
