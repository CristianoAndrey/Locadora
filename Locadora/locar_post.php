<?php
session_start();

$nomealugado = $_SESSION['login'];
$id = $_SESSION['id'];
$marca = $_SESSION['marca'] ;
$modelo = $_SESSION['modelo'] ;
$preco = $_SESSION['preco'] ;
$Km = $_SESSION['Km'] ;

    if($_POST){
        include "conexao.php";

        try {
            $stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco, Km, nomealugado) values(?, ?, ?, ?, ?)");
            
            $stmt->bindParam(1, $marca);
            
            $stmt->bindParam(2, $modelo);
            
            $stmt->bindParam(3, $preco);
            
            $stmt->bindParam(4, $Km);
            
            $stmt->bindParam(5, $nomealugado);
    
            if ($stmt->execute()) {
            
            if ($stmt->rowCount() > 0 ){
            
            header('location: index.php');
            
            } else {
            
            echo "Erro: Não foi possivel executar a declaração sql";
            
            }
            
            } else {
            
            echo "Erro na execução do cadastro! ";
            
            }
            
            } catch (PDOException $erro) {
            
            echo "Erro na conexão :" . $erro->getMessage();
            
            }

            try {
            
                $stmt = $conexao->prepare("DELETE FROM carro WHERE id = ?;");
                $stmt->bindParam(1, $id); 
                
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
