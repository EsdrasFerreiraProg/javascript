<?php
    include("insere-bd.php");

    $msg = false;

    if(isset($_POST['submit'])){
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $nomemae = $_POST['nomemae'];
        $nomepai = $_POST['nomepai'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $extensao1 = strtolower(substr($_FILES['rgfrontal']['name'], -4));
        $extensao2 = strtolower(substr($_FILES['rgtraseiro']['name'], -4));
        $extensao3 = strtolower(substr($_FILES['cartaovacinafrontal']['name'], -4));
        $extensao4 = strtolower(substr($_FILES['cartaovacinatraseiro']['name'], -4));
        $extensao5 = strtolower(substr($_FILES['comprovanteresidencia']['name'], -4));

        $i = 0;

        $novo_nome1 = $cpf . " - ". $i++ . $extensao1;
        $novo_nome2 = $cpf . " - ". $i++  . $extensao2;
        $novo_nome3 = $cpf . " - ". $i++  . $extensao3;
        $novo_nome4 = $cpf . " - ". $i++  . $extensao4;
        $novo_nome5 = $cpf . " - ". $i++  . $extensao5;
        
        
        $diretorio = "images/";

        move_uploaded_file($_FILES['rgfrontal']['tmp_name'], $diretorio.$novo_nome1);
        move_uploaded_file($_FILES['rgtraseiro']['tmp_name'], $diretorio.$novo_nome2);
        move_uploaded_file($_FILES['cartaovacinafrontal']['tmp_name'], $diretorio.$novo_nome3);
        move_uploaded_file($_FILES['cartaovacinatraseiro']['tmp_name'], $diretorio.$novo_nome4);
        move_uploaded_file($_FILES['comprovanteresidencia']['tmp_name'], $diretorio.$novo_nome5);

        $sql_code = "INSERT INTO pessoasfisicas (cpf,rg,foto_frente_rg,foto_tras_rg,foto_frente_cartao
        ,foto_tras_cartao,comprov_residencia,nome_mae,nome_pai,email,senha) VALUES(
            '$cpf', '$rg', '$novo_nome1', '$novo_nome2', '$novo_nome3', '$novo_nome4', '$novo_nome5', '$nomemae', '$nomepai',
            '$email', '$senha')";

        if($conexao->query($sql_code))
            $msg = "Arquivo enviado";
        else
            $msg = "Falha";    

    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("laboratory-2815641_1920.jpg");
			background-size: cover;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
      
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
		.imagem1{
			margin-top: 570px;
			
		}
		.imagem11{
			width: 10%;
		}
		.imagem12{
			width: 10%;
		}
		.imagem-ccea{
			width:5%;
			margin-left: 1250px;
			
		}
	
    </style>
</head>
<body>
	<header>
		<img class="imagem-ccea" src = "arte_logo_final1-2-300x300.jpg">
	</header>
    <div class="box">
        <?php if ($msg != false) echo "<p> $msg </p>"; ?>
        <form action="cadastro-pf.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Fórmulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">Seu CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="rg" id="rg" class="inputUser" required>
                    <label for="rg" class="labelInput">Seu RG</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomemae" id="nomemae" class="inputUser" required>
                    <label for="nomemae" class="labelInput">Nome da mãe</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomepai" id="nomepai" class="inputUser" required>
                    <label for="nomepai" class="labelInput">Nome do pai</label>
                </div>
                
                <br><br>
                <div class="inputBox">
                    <input type="file" name="rgfrontal" id="rgfrontal" class="inputUser" required>
                    <label for="rgfrontal" class="labelInput"></label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="rgtraseiro" id="rgtraseiro" class="inputUser" required>
                    <label for="rgtraseiro" class="labelInput"></label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="cartaovacinafrontal" id="cartaovacinafrontal" class="inputUser" required>
                    <label for="cartaovacinafrontal" class="labelInput"></label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="cartaovacinatraseiro" id="cartaovacinatraseiro" class="inputUser" required>
                    <label for="cartaovacinatraseiro" class="labelInput"></label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="comprovanteresidencia" id="comprovanteresidencia" class="inputUser" required>
                    <label for="comprovanteresidencia" class="labelInput"></label>
                </div>
                
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
				<br><br>
               
				<div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser"  required>
                    <label for="senha" class="labelInput" >Senha</label>
                </div>
				<br><br>
               
                
                <p id ="message"></p>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
	</div>

   
	<footer class = "imagem1">
		<img class="imagem11" src = "uepbimg.png">
		<img class="imagem12" src = "minsaudelogo.png">
	</footer>
</body>

</html>