<?php
	/*session_start();
	if (isset($_SESSION["numlogin"])) {
		$nl=$_GET["num"];
		$n2=$_SESSION["numlogin"];
		if ($n1!=$n2) {
			echo "<p>Login não efetuado</p>";
			exit;
		}
	}else{
		echo "<p>Login não efetuado</p>";
		exit;
	}

	include "conexao.inc";*/
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Menu</title>
</head>
<body>

	<section id="main">
		<a href="gerenciamento.php" target="_self" class="btmenu">Voltar</a>
		<h1>Excluir Usuário</h1>

		<?php
			include "conexao.inc";
			if (isset($_GET["f_bt_excluir_colaborador"])) {
				$vid=$_GET["f_colaboradores"];
				$sql="DELETE FROM users WHERE id_user=$vid";
				mysqli_query($con,$sql);
				$linhas=mysqli_affected_rows($con);
				if ($linhas >= 1) {
					echo "<p>Usuário deletado com sucesso</p>";
				} else {
					echo "<p>Erro ao deletar Usuário</p>";
				}
			}
		?>

		<form name="f_bt_excluir_colaborador" action="excluir_usuario.php" class="f_colaborador" method="get">
			<input type="hidden" name="num" value="<?php echo $n1; ?>">

			<select name="f_colaboradores" size="10">
				<?php
					$sql="SELECT * FROM users";
					$col=mysqli_query($con,$sql);
					while ($exibe=mysqli_fetch_array($col)) {
						echo "<option value='".$exibe['id_user']."'>".$exibe['name']."</option>";
					}
				?>
			</select>
			<input type="submit" name="f_bt_excluir_colaborador" class="btmenu" value="excluir">
		</form>
	</section>
	
</body>
</html>