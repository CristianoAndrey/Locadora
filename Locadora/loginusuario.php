<?php
session_start();
$email = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senha = md5($_POST["senha"]);

include 'conexao.php';

$sth = $conexao->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
$sth->bindValue(":login", $email);
$sth->bindValue (":senha", $senha);
$sth->execute();

$num = $sth->rowCount();

if ($num > 0) {
    $_SESSION['login'] = $email;
    $_SESSION['senha'] = $senha;

    header("LOCATION: index.php");

} else {
    ?>
    <script>alert("Login ou senha errados!");
        window.location.href = "login.php";
    </script>
    <?php

}

