<?php
session_start();

if(!isset($_SESSION['email']) or $_SESSION['tipo'] !== "usuario"){
  header('location:../index.php');
  exit; // Adicione esta linha para interromper a execução do script após o redirecionamento
}
?>
