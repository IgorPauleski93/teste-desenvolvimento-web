<?php

	include "conexao.inc";
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
		<h1>Editar Usuário</h1>

		<form name="f_bt_editar_colaborador" action="editar_usuario.php" class="f_colaborador" method="get">
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
			<input type="submit" name="f_bt_editar_colaborador" class="btmenu" value="editar">
		</form>

		<?php
			include "conexao.inc";
			if (isset($_GET["f_colaboradores"])) {
				$vid=$_GET["f_colaboradores"];
				$sql="SELECT * FROM users WHERE id_user=$vid";
				$col=mysqli_query($con,$sql);
				$exibe=mysqli_fetch_array($col);
				if ($exibe >= 1) {
					echo "
						<form name='f_edita_colaborador' action='editar_usuario.php' class='f_colaborador' method='get'>
						<input type='hidden' name='id' value='".$exibe['id_user']."'>
						<label>Nome</label>
						<input type='text' name='f_name' size='50' maxlength='50' requires='required' value='".$exibe['name']."'>
						<label>E-mail</label>
						<input type='text' name='f_email' size='50' maxlength='50' requires='required' value='".$exibe['email']."'>
						<label>Senha</label>
						<input type='text' name='f_password' size='50' maxlength='50' requires='required' value='".$exibe['password']."'>
						<label>Acesso</label>
						<input type='text' name='f_acess' size='50' maxlength='50' requires='required' value='".$exibe['acess']."' placeholder='0 ou 1' pattern='[0-1]+$'>
						<input type='submit' name='f_bt_edita_colaborador' class='btmenu' value='gravar'>
					";
				}
			}
		

			if (isset($_GET["f_bt_edita_colaborador"])) {
				$vid=$_GET["id"];
				$vname=$_GET["f_name"];
				$vemail=$_GET["f_email"];
				$vpassword=$_GET["f_password"];
				$vacess=$_GET["f_acess"];


				$sql="UPDATE users SET name='$vname', email='$vemail', password='$vpassword', acess='$vacess' WHERE id_user=$vid";
				$res=mysqli_query($con,$sql);
				$linhas=mysqli_affected_rows($con);
				if ($linhas >= 1) {
					echo "<p>Usuário Editado com sucesso</p>";
				} else {
					echo "<p>Erro ao editar Usuário</p>";
				}
			}
		?>
	</section>
	
</body>
</html>