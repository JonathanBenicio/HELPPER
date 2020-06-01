<?php
include '../dao/agendaDAO.php';
if(isset($_POST['OK'])) {
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $cep = $_POST['CEP'];
    $logradouro = $_POST['Logradouro'];
    $numero = $_POST['Numero'];
    $bairro = $_POST['Bairro'];
    $cidade = $_POST['Cidade'];
    $estado = $_POST['Estado'];
    $resultado = cadastro_Cliente( $nome, $email, $telefone, $cep, $logradouro, $numero, $bairro, $cidade, $estado);
           
    if($resultado->rowCount() == 1){
        echo "Cadastrado com sucesso";
        Header("Location: home_page.php");
    }
}

if(isset($_GET['idParaExcluir'])) {
    excluir_Cliente($_GET['idParaExcluir']); 
}


?>



<html>
<head>
 		<meta charset="utf-8">
 		<title>Sistema de Login</title>
</head>

<body>
    <section>
        <h3>Formulario de Cadastro de Cliente</h3>
        
        <div class="box">
            <form action="#" method="POST">
                
                <p>Digite seu Nome: <input name="Nome" type="text" placeholder="Seu Nome" required ></p>
                
                <p>Digite seu E-mail: <input name="Email" type="text" placeholder="Seu E-mail" required></p>
                
                <p>Digite seu Telefone: <input name="Telefone" type="tel" placeholder="Seu Telefone" required ></p>

                <p>Digite seu CEP: <input name="CEP" type="text" placeholder="Seu CEP" required></p>

                <p>Digite seu Logradouro: <input name="Logradouro" type="text" placeholder="Seu Logradouro" required></p>

                <p>Digite seu Número: <input name="Numero" type="tel" placeholder="Seu Numero" required ></p>

                <p>Digite seu Bairro: <input name="Bairro" type="text" placeholder="Seu Bairro" required></p>

                <p>Digite seu Cidade: <input name="Cidade" type="text" placeholder="Seu Cidade" required></p>

                <p>Digite seu Estado: <input name="Estado" type="text" placeholder="Seu Estado" required></p>
                
                
                    
                <button type="submit" name="OK">Cadastrar</button>
            </form>
            
        </div>
    </section>


    <section>

        <table borde="2" bordercolor="#EEE" >
            <tr>
                <td><h3>Rotinas cadastradas no sistema</h3></td>
            </tr>
            
            <tr>
                <td><strong>Nome</strong></td>
                <td><strong>E-mail</strong></td>                        
                <td><strong>Telefone</strong></td>                        
                <td><strong>CEP</strong></td>                        
                <td><strong>Logradouro</strong></td>                        
                <td><strong>Número</strong></td>                        
                <td><strong>Bairro</strong></td>                        
                <td><strong>Cidade</strong></td>                        
                <td><strong>Estado</strong></td> 
                <td><strong>Estado</strong></td> 
                
                                       
            </tr>
            <?php 
            $consulta = consulta_Clientes();
            while ($lista = $consulta->fetch(PDO::FETCH_OBJ)){
                $ID=$lista->ID."<br>";
                $Nome=$lista->Nome."<br>";
                $Email=$lista->Email. "<br>";
                $Telefone=$lista->Telefone."<br>";
                $CEP=$lista->CEP."<br>";
                $Logradouro=$lista->Logradouro."<br>";
                $Numero=$lista->Numero."<br>";
                $Bairro=$lista->Bairro."<br>";
                $Cidade=$lista->Cidade."<br>";
                $Estado=$lista->Estado."<br>";?>
                
                <tr>
                    <td><?=$Nome?></td>
                    <td><?=$Email?></td>
                    <td><?=$Telefone?></td>
                    <td><?=$CEP?></td>
                    <td><?=$Logradouro?></td>
                    <td><?=$Numero?></td>
                    <td><?=$Bairro?></td>
                    <td><?=$Cidade?></td>
                    <td><?=$Estado?></td>
                    <td><?=  " <a href=\"home_page.php?idParaExcluir=$lista->ID\" > <button type=\"submit\"> Excluir</button>  </a>" ?></td>
                    
                </tr>
                    
            <?php }?>
        </table>
    </section>
   
</body>

</html>