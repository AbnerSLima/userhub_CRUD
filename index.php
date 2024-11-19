<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Usuários
                <a href="create.php" class="btn btn-primary float-end">Adicionar usuário</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM users';
                  $usuarios = mysqli_query($conexao, $sql);
                  if (mysqli_num_rows($usuarios) > 0) {
                    foreach($usuarios as $usuario) {
                  ?>
                  <tr>
                    <td><?=$usuario['user_id']?></td>
                    <td><?=$usuario['nome']?></td>
                    <td><?=$usuario['login']?></td>
                    <td><?=date('d/m/Y H:i', strtotime($usuario['data_cadastro']))?></td>
                    <td>
                      <a href="view.php?user_id=<?=$usuario['user_id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                      <a href="edit.php?user_id=<?=$usuario['user_id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="crud.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete" value="<?=$usuario['user_id']?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                 } else {
                   echo '<h5>Nenhum usuário encontrado</h5>';
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>