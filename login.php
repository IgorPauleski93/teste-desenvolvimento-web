<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>
<body>
	<section id="main">
		<?php

			include "conexao.inc"

			if (isset($_POST["f_logar"])) {
				$user=$_POST["f_user"];
				$senha=$_POST["f_senha"];

				//MySQL
				$sql="SELECT * FROM users WHERE name='$user' AND password='$senha'";
				$res=mysqli_query($con,$sql);
				$ret=mysqli_affected_rows($con);
				

				if ($ret == 0) {
					echo "<p id='lgErro'>Login incorreto!</p>";
				} else {
					//Criar a chave de segurança e armz. na sessão;
					$chave1="abcdefghijklmnopqrstuvwxyz";
					$chave2="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					$chave3="0123456789";
					$chave=str_shuffle($chave1.$chave2.$chave3);
					$tam=strlen($chave);
					$num="";
					$qtde=rand(20,50);
					for ($i=0; $i < $qtde; $i++) { 
						$pos=rand(0,$tam);
						$num.=substr($chave, $pos, 1);
					}
					session_start();
					$_SESSION['numlogin']=$num;
					$_SESSION['username']=$num;

					//Fazer a chamada do gerenciamento;
					header("location:gerenciamento.php?num=$num");
				}
			}
			//Fechando a conexão;
			mysqli_close($con);
		?>
		<form action="login.php" method="post" name="f_login" id="f_login">
			<label>Usuário</label><br>
			<input type="text" name="f_user">
			<br>
			<label>Senha</label><br>
			<input type="password" name="f_senha">
			<br>
			<input type="submit" value="LOGAR" name="f_logar">
			<input type="submit" value="CAD. USUARIO" name="f_cadastro">
			<input type="submit" value="RECUPERAR SENHA" name="f_recuperar">
		</form>
	</section>
</body>
</html>