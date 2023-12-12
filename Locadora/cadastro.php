<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link type="text/css">
</head>




<body>
    <!-- Barra de tarefas -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">Login</a>
      <ul id="nav-mobile" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="cadastro.php">Cadastrar</a></li>
      </ul>
    </div>
  </nav>


  <!-- Inicio do Formulario-->


  <div class="container">
<form class="ms-auto me-auto mt-3" method="post" id="formlogin" name="formlogin" action="cadastrousuario.php" style="width: 500px">
  
  <div style="margin-left: 50px"><img src="logo.jpg" alt="tag" text-align="center" width="400px" height="400px" >
      </div>  
<div class="mb-3">   
<label class="form-label" style="text-align: center">Nome</label>
<input id="login" class="form-control" type="text" name="login" required>
    </div>
    <div class="mb-3">
    <label class="form-label" style="text-align: center">Senha</label>
    <input id="senha" type="password"name="senha" class="form-control"  maxlength="12" minlength="4" required>   
    </div>
    <button type="submit" class="btn btn-primary">Logar</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>