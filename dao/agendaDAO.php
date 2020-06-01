<?php 

function conectar(){
    
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "helpper";
    
    try{
        
        $conn = new PDO("mysql:host=$servername; port=3306; dbname=$dbname", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function cadastro_Cliente($nome, $email, $telefone, $cep, $logradouro, $numero, $bairro, $cidade, $estado){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "INSERT INTO `clientes` ( `Nome`, `Email`, `Telefone`, `CEP`, `Logradouro`, `Numero`, `Bairro`, `Cidade`, `Estado`) VALUES (
'{$nome}', '{$email}', '{$telefone}', '{$cep}', '{$logradouro}', '{$numero}', '{$bairro}', '{$cidade}', '{$estado}')";
        
        return $bancoDeDados->query($consulta);
        
        
    } catch (Exception $e){
        echo  "Erro cadastro_Cliente: " .$e->getMessage();
    }
}

function consulta_Clientes(){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "SELECT * FROM `clientes`";
        
        return $bancoDeDados->query($consulta);
        
        
    } catch (Exception $e){
        echo  "Erro consulta_Cliente: " .$e->getMessage();
    }
}


function excluir_Cliente($ID){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "DELETE FROM `clientes` WHERE `clientes`.`ID` = $ID";
        
        return $bancoDeDados->query($consulta);
        
        
    } catch (Exception $e){
        echo  "Erro consulta_Cliente: " .$e->getMessage();
    }

}