<?php
session_start();
require 'conexao.php';

if (isset($_POST['login'])) {
    $login = mysqli_real_escape_string($conexao, trim($_POST['login']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $query = "SELECT * FROM users WHERE login = '$login'";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['is_logged_in'] = true;

            header('Location: index.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Senha incorreta.';
        }
    } else {
        $_SESSION['mensagem'] = 'Usuário não encontrado.';
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserHub - Login</title>
    <link rel="icon" type="image/png" href=".\public\favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light bg-gradient">
<div class="container mt-4">
    <div class="d-flex justify-content-center w-100 p-3" style="height: 40vh;">
      <img src=".\public\logo1.png" class="img-fluid" alt="Logo User Hub ">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center text-white bg-secondary bg-gradient">
                    <h5>Login</h5>
                </div>
                <div class="card-body">
                    <?php include('mensagem.php'); ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="login" class="form-label">Usuário</label>
                            <input type="text" name="login" class="form-control rounded-pill border border-2 border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control rounded-pill border border-2 border-secondary" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark w-50 fw-bolder">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
