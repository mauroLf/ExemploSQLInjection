<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $conexao = mysqli_connect('localhost','root','');
  $banco = mysqli_select_db($conexao,'injection');
  mysqli_set_charset($conexao,'utf8');

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$query = "select usuario, senha from usuario where usuario='$usuario' and senha='$senha'";
  $result = mysqli_query($conexao,$query) or die("Erro");
	$rows = mysqli_fetch_array($result);
	if($rows) {
		echo "Logado com sucesso";
	}
	else {
		echo "Não logou. Tente novamente.";
	}

  //para testar coloque 'or''='
  //echo '<br/><br/>'.$query;

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Demonstrando Injection - Canal TI</title>
</head>
<body>
<form action="index.php" method="POST">
  <h2>Demonstrando SQL Injection - Canal TI</h2><br>
  Usuário:<br>
  <input type="text" name="usuario"><br><br>
  Senha:<br>
  <input type="text" name="senha"><br><br>
  <input type="submit" value="Logar">
</form>
</body>
</html>