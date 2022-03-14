<?php
    if(isset($_POST['submit'])){
        

        include_once('insere-bd.php');
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        
        $result = mysqli_query($conexao, "INSERT INTO pessoasjuridicas(cnpj,email,senha) values ('$cnpj','$email','$senha')");
        
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
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastre-se como PJ</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                    <label for="cnpj" class="labelInput">CNPJ da Empresa</label>
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