<?php

include 'conexao.php';
$login = filter_input (INPUT_POST, 'login', FILTER_DEFAULT);
$password = md5($_POST["senha"]);

           
$sth = $conexao->prepare("INSERT INTO usuarios (login, senha) VALUES (:login,:password)");


$sth->bindValue(":login", $login);
$sth->bindValue(":password", $password);
$sth->execute();

?>

<script>alert("Usuário cadastrado com sucesso!");
   window.location.href="login.php";
  </script>


