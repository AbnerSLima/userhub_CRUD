<?php
require 'conexao.php';
require 'auth.php';
?>
<!doctype html>
<html lang="pt-bp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserHub - Visualizar Usuário</title>
    <link rel="icon" type="image/png" href=".\public\favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary bg-gradient">
              <h4 class="text-white">Visualizar usuário
                <a href="index.php" class="btn btn-danger float-end bg-gradient">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
              if (isset($_GET['user_id'])) {
                  $usuario_id = mysqli_real_escape_string($conexao, $_GET['user_id']);
                  $sql = "SELECT * FROM users WHERE user_id='$usuario_id'";
                  $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $usuario = mysqli_fetch_array($query);
                ?>
                <div class="mb-3 ">
                  <label>Nome</label>
                  <p class="form-control rounded-pill border border-2 border-secondary">
                    <?=$usuario['nome'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Login</label>
                  <p class="form-control rounded-pill border border-2 border-secondary">
                    <?=$usuario['login'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Data da criação</label>
                  <p class="form-control rounded-pill border border-2 border-secondary">
                    <?=date('d/m/Y H:i', strtotime($usuario['data_cadastro']));?>
                  </p>
                </div>
                <?php
                } else {
                  echo "<h5>Usuário não encontrado</h5>";
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>