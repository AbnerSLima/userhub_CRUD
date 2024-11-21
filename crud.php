<?php
session_start();
require 'conexao.php';
if (isset($_POST['create'])) {
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	$senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';
	$sql = "INSERT INTO users (nome, login, senha) VALUES ('$nome', '$email', '$senha')";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Usuário criado com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi criado';
		header('Location: index.php');
		exit;
	}
}
if (isset($_POST['update'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['login']));
	$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
	$sql = "UPDATE users SET nome = '$nome', login = '$email'";
	if (!empty($senha)) {
		$sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
	}
	$sql .= " WHERE user_id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi atualizado!';
		header('Location: index.php');
		exit;
	}
}
if (isset($_POST['delete'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['delete']);
	$sql = "DELETE FROM users WHERE user_id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['message'] = 'Usuário deletado com sucesso!';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['message'] = 'Usuário não foi deletado!';
		header('Location: index.php');
		exit;
	}
}
if (isset($_GET['search'])) {
	$search = mysqli_real_escape_string($conexao, trim($_GET['search']));
	$sql = "SELECT * FROM users WHERE nome LIKE '%$search%' OR login LIKE '%$search%' ORDER BY user_id ASC";
	$result = mysqli_query($conexao, $sql);
	$usuarios = [];
	if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					$usuarios[] = $row;
			}
	}
	$_SESSION['usuarios'] = $usuarios;
	header('Location: index.php');
	exit;
}
?>