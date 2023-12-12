<?php
    if($_GET){
        $id = $_GET['cod'];
                
        include "conexao.php";

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            $stmt = $conexao->prepare("DELETE FROM usuarios WHERE ID = ?;");
            $stmt->bindParam(1, $id); 
            
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