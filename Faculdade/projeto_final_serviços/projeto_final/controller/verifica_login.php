<?php
require("../conn/conex.php");

if(isset($_POST['submit'])){
  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :login AND senha = :senha");
  $sql->bindParam(':login', $login);
  $sql->bindParam(':senha', $senha);  
  $sql->execute();

  if($sql->rowCount() > 0){
    session_start();
    $_SESSION['email'] = $login;

    $user = $sql->fetch(PDO::FETCH_ASSOC);
    $response = array(
      'success' => true,
      'user_type' => $user['tipo']
    );
     $_SESSION['tipo'] = $user['tipo'];
    echo json_encode($response);
  } else {
    $response = array(
      'success' => false,
      'message' => 'Nome de usuário ou senha inválidos'
    );
    echo json_encode($response);
  }
}
?>
