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
	}*/

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
		<a href="gerencimento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
		<h1>Novo Usuário</h1>

		<?php
			if (isset($_GET["f_bt_novo_colaborador"])) {
				$vname=$_GET["f_name"];
				$vpassword=$_GET["f_password"];
				$vemail=$_GET["f_email"];
				$vacess=$_GET["f_acess"];

				$sql="INSERT INTO users (name,password,email,acess) VALUES ('$vname','$vpassword','$vemail','$vacess')";
				mysqli_query($con,$sql);
				$linhas=mysqli_affected_rows($con);
				if ($linhas >= 1) {
					echo "<p>Novo Colaborador gravado com sucesso</p>";
				} else {
					echo "<p>Erro ao gravar novo Colaborador</p>";
				}
			}
		?>

		<form name="f_bt_novo_colaborador" action="novo_usuario.php" class="f_colaborador" method="get">
			<input type="hidden" name="num" value="<?php echo $n1; ?>">
			<label>Nome</label>
			<input type="text" name="f_name" maxlength="245" size="50" required="required">
			<label>E-mail</label>
			<input type="text" name="f_email" maxlength="245" size="50" required="required">
			<label>Senha</label>
			<input type="text" name="f_password" maxlength="245" size="50" required="required">
			<label>Acesso</label>
			<input type="text" name="f_acess" maxlength="245" size="50" required="required" pattern="[0-1]+$" placeholder="0 ou 1" title="0 ou 1">
			<input type="submit" name="f_bt_novo_colaborador" class="btmenu" value="gravar">
		</form>
	</section>
	
</body>
</html>