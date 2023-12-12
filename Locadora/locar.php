<!DOCTYPE html>
<html>

<head>
<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:locar.php');
  }

$logado = $_SESSION['login'];
?>

<title>Inicio</title>
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <link type="text/css">
 
</head>
<style type="text/css">
* {
  color:white;
  text-align: center; 
  color: black;
}
.bc {
    margin-left: 35px;
    margin-right: 45px;
}
</style>

<body>
    <!-- Barra de tarefas -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">Inicio</a>
      <ul id="nav-mobile" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="buscar.php">Buscar</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <!-- Inicio do Formulario-->
<br>
<br>
<br>
<br>
<br>
<div class="bc">  

 <table>
        <thead>
  <tr>
      <th>id</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Preço</th>
      <th>Km</th>
      <th>Data cadastro</th>
      <th>Ações</th>
      
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
            include "conexao.php";
            try {
                $stmt = $conexao->prepare("SELECT * FROM carro WHERE nomealugado IS NULL ORDER BY id DESC;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo"<tr>
                            <td>{$rs->id}</td>
                            <td>{$rs->marca}</td>
                            <td>{$rs->modelo}</td>
                            <td>{$rs->preco}</td>
                            <td>{$rs->Km}</td>
                            <td>{$rs->dt_cadastro}</td>
                             <td><a class='btn waves-effect waves-light' href='locarcarro.php?cod={$rs->id}'>locar</a></td> 
                            </tr>";
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?>
        </tbody>
      </table>

  </tbody>
  
</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>