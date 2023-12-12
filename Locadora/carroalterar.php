<?php
    // Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
    // Verifica se foi enviando dados via GET
    if ($_GET) {
        $id = (isset($_GET["cod"]) && $_GET["cod"] != null) ? $_GET["cod"] : "";
        //echo "<script>alert('".$id."');</script>";
        include 'conexao.php';
        try {
            $stmt = $conexao->prepare("SELECT * FROM carro WHERE id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->id;
                $marca = $rs->marca;
                $modelo = $rs->modelo;
                $preco = $rs->preco;   
                //echo "<script>alert('".$marca."');</script>";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }
?>
<?php
    if($_POST){
        $id = $_POST['txtid'];
        $marca = $_POST['txtmarca'];
        $modelo = $_POST['txtmodelo'];
        $preco = $_POST['txtpreco'];
        
        include "conexao.php";

        try {
           
            $stmt = $conexao->prepare("UPDATE carro SET marca=?, modelo=?, preco=? WHERE id=?");
            $stmt->bindParam(1, $marca); 
            $stmt->bindParam(2, $modelo);
            $stmt->bindParam(3, $preco);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: index.php');
                }else{
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <!--Materialize-->
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link type="text/css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
</head>
<body>
       <!-- Barra de tarefas -->
       <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a href="index.php" class="navbar-brand">Inicio</a>
      <ul id="nav-mobile" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

<br>
<br>
<br>
<br>
<br>
<div class="bc">  
  <div class="row">
  <form action="carroalterar.php" method="post" class="ms-auto me-auto mt-3">
  <input type="hidden" name="txtid" value = '<?php echo "{$id}";?>'/>
      <div class="mb-3">
      <label class="form-label">Modelo</label>     
        <input id="txtmodelo" class="form-control" type="text" name="txtmodelo" class="validate" required value = '<?php echo "{$modelo}";?>'>
        </div>

        <div class="mb-3">
        <label class="form-label">Marca</label>     
        <input id="txtmarca" class="form-control" type="text" name="txtmarca" class="validate" required value = '<?php echo "{$marca}";?>'>
        </div>
        <div class="mb-3">
        <label class="form-label">Preço</label>     

        <input id="txtpreco" class="form-control" type="number" step="0.02" name="txtpreco" class="validate" required value = '<?php echo "{$preco}";?>'>
        </div>
    
      <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="action">Alterar</button>
                <a href="index.php"><button class="btn btn-primary" type="button" name="action">Cancelar</button></a>
            </div>
            </form>
  </div>
    <!--JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script>
        M.AutoInit();
    </script>
</body>
</html>

<?php
    if($_POST){
        $id = $_POST['txtid'];
        $marca = $_POST['txtmarca'];
        $modelo = $_POST['txtmodelo'];
        $preco = $_POST['txtpreco'];
        

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            $stmt = $conexao->prepare("UPDATE carro SET marca=?, modelo=?, preco=? WHERE id=?");
            $stmt->bindParam(1, $marca); 
            $stmt->bindParam(2, $modelo);
            $stmt->bindParam(3, $preco);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: index.php');
                }else{
                    //throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>
