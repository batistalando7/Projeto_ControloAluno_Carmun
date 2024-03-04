<?php
session_start();
include_once('Classe_Conexao.php');
if(isset($_POST['entrar']))
      {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        
        $sql = "SELECT COUNT(*) as cntUser FROM tb_utilizador WHERE nome_ut = '$nome' and senha_ut= '$senha' ";
        $result = mysqli_query($conexao,$sql);
		$row = mysqli_fetch_array($result);
		$count = $row['cntUser'];
        if($count > 0)
        {
			
			$sql = "SELECT * FROM `tb_utilizador` WHERE nome_ut= '$nome' ";
            $result1 = $conexao->query($sql);
			$cliente_nome = mysqli_fetch_assoc($result1);
		    $_SESSION['utilizador'] = $cliente_nome['nome_ut'];
			$result = mysqli_query($conexao,$sql);
			if($result)
			{
			echo "<script>alert('SUCCESS!'); window.location.href='index.php'</script>";	
			//BUSCAR ID DO CLIENTE
			$sql1 = "SELECT * FROM tb_utilizador ORDER BY id_utilizador DESC LIMIT 1";
			$result1 = $conexao->query($sql1);
			$dados1 = mysqli_fetch_assoc($result1);
			$id_utilizador = $dados1['id_utilizador'];   
			$_SESSION['idut'] = $id_utilizador ; 
			//FECHAR BUSCAR 
			}
        } 
        else
		{
        echo "<script>alert('Erro ao cadastrar!'); window.location.href='Page_Login.php'</script>";
		}
		}	//FECHAR
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de registro de alunos do Madrugada</title>
    <link rel="stylesheet" href="./css/assets/dist/css/bootstrap.min.css">
    <script src="./css/assets/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-image: url('./images/Tela_Login.jpeg');
            align-items: center;
        }
        .btnentrar{
            background-color: grey;
            width: 100%;
        }
        .quem-somos{
            margin-left: 1%;
            margin-bottom: 0%;
        }
        .texto-quemSomos {
            margin-top: 0%;
           text-align: justify;
            display: inline-block;
            font-size: 15pt;
            margin-right: 5%;
            margin-left: 5%

        }
        .frm{
            background-color: rgb(255, 255, 255);
            padding: 35px;
            margin: 25% 35%;
            border-radius: 20%;
            display: flex;
            flex-direction: column;
        }
        .icon{
            background-color: grey;
            border-radius: 50%;
            padding: 10px;
            margin: 5px 100px;
        }
        
    </style>
</head>

<body>

    <!--Inicio de log-->
    <section id="Login">
    <div class="frm">
        <div class="icon">
        <center><img src="./images/lg.png" width="79" alt="User_icon"></center>
        </div>
        <h2>Login </h2>
        <form method="post">
          <div>
            <label for="nome">User Name</label>
            <input type="text" class="form-control" id="nome" placeholder="Inserir o nome" name="nome">
            <label for="nome">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Inserir a Senha" name="senha">
          </div><br>
          <button type="submit" class="btnentrar" name="entrar"> Entrar</button>
        </form>
      </div>
    </section>
    <!--Fim de log-->
