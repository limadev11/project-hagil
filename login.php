<?php
session_start();
include('connect.php');

// so vai executar o login se houver usuario e senha digitados
if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

// a funcao abaixo é para proteger o acesso
$email = mysqli_real_escape_string($con, $_POST['email']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);

// funcao md5 criptografa a senha
$query = "select email, nome, master from usuario where email = '{$email}' and senha = '{$senha}'";
//$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

// executa a query
$result = mysqli_query($con, $query);

// numero de linhas retornadas
$valores = mysqli_fetch_assoc($result);
$nome = $valores['nome'];
$master = $valores['master'];
$row = mysqli_num_rows($result);

// se tem uma linha, ok. senao não tem o usuario
if($row == 1) {
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;
	$_SESSION['master'] = $master;
	header('Location: menu.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>
