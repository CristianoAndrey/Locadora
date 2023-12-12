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
    <a href="buscar.php" class="brand-logo center" style="color: black">Resultado da Busca</a>
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

</div>
 
</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>



<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "locadora";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM carro WHERE marca LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	
    if($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "Marca: ".$rows_cursos['marca']."<br>";
        echo "Modelo: ".$rows_cursos['modelo']."<br>";
        echo "Preço: ".$rows_cursos['preco']."<br>";
        echo "Data do cadastramento: ".$rows_cursos['dt_cadastro']."<br><br><br><br>";
        echo"<td><a class='btn waves-effect waves-light' href='buscar.php'>Nova pesquisa</a> </td>";
	} 

else {  
       echo "Nenhuma marca foi encontrada no Banco de dados.<br><br><br><br>";
    echo"<td><a class='btn waves-effect waves-light' href='buscar.php'>Nova pesquisa</a> </td>";
}
?>