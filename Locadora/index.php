<!DOCTYPE html>
<html>

<head>
<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:index.php');
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
        <li class="nav-item"><a class="nav-link" href="locar.php">Locar</a></li>
         <li class="nav-item"><a class="nav-link" href="locados.php">Locados</a></li>
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
<section class="container">
        <form action="carrosalvar.php" method="post" class="ms-auto me-auto mt-3">
            <div class="mb-3">
            <label class="form-label">Marca</label>     
            <input id="txtmarca" class="validate"  type="text" name="txtmarca" class="form-control" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Modelo</label>  
            <input id="txtmodelo" type="text" name="txtmodelo" class="validate" class="form-control" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Preço</label>         
            <input id="txtpreco" class="validate"  type="number" step="1000.00" class="form-control" name="txtpreco"  required>
            </div>
            <div class="mb-3">
            <label class="form-label">Km</label>         
            <input id="Km" class="validate"  type="number" step="1" class="form-control" name="Km" max="1000000" required>
            </div>
                <button class="btn btn-primary" type="submit" name="action">Inserir</button>
                <button class="btn btn-primary" type="reset" name="action">Cancelar</button>
        </form>
 <table>
        <thead>
  <tr>
      <td>id</td>
      <td>Marca</td>
      <td>Modelo</td>
      <td>Preço</td>
      <td>Km</td>
      <td>Data cadastro</td>
      <th>Ações</th>
      
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
            include "conexao.php";
            try {
                $stmt = $conexao->prepare("SELECT * FROM carro ORDER BY id DESC;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo"<tr>
                            <td>{$rs->id}</td>
                            <td>{$rs->marca}</td>
                            <td>{$rs->modelo}</td>
                            <td>{$rs->preco}</td>
                            <td>{$rs->Km}</td>
                            <td>{$rs->dt_cadastro}</td>
                             <td><a class='btn waves-effect waves-light' href='carroalterar.php?cod={$rs->id}'>Editar</a></td>
                             <td><a class='btn waves-effect waves-light' href='carroexcluir.php?cod={$rs->id}'>Apagar</a> </td>
                            
                             
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
  
  <table>
        <thead>
  <tr>
      <td>ID</td>
      <td>Login</td>
      <td>Ação</td>
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
            try {
                $stmt = $conexao->prepare("SELECT * FROM usuarios ORDER BY id DESC;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo"<tr>
                            <td>{$rs->ID}</td>
                            <td>{$rs->login}</td>
                            
                            <td><a class='btn waves-effect waves-light' href='usuarioexcluir.php?cod={$rs->ID}'>Apagar</a> </td>
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