<?php
header("Content-Type: application/json");
require 'conexao.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            getUser($id);
        } else {
            getUsers();
        }
        break;

    case 'POST':
        createUser();
        break;

    case 'PUT':
        $id = $_GET['id'];
        updateUser($id);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        deleteUser($id);
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getUsers() {
    global $conexao;
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conexao, $sql);

    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    echo json_encode($users);
}

function getUser($id) {
    global $conexao;
    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        echo json_encode(array('message' => 'Usuário não encontrado.'));
    }
}

function createUser() {
    global $conexao;
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['nome']) && !empty($data['login']) && !empty($data['senha'])) {
        $nome = $data['nome'];
        $login = $data['login'];
        $senha = password_hash($data['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (nome, login, senha) VALUES ('$nome', '$login', '$senha')";
        if (mysqli_query($conexao, $sql)) {
            echo json_encode(array('message' => 'Usuário criado com sucesso!'));
        } else {
            echo json_encode(array('message' => 'Erro ao criar usuário.'));
        }
    } else {
        echo json_encode(array('message' => 'Dados incompletos.'));
    }
}

function updateUser($id) {
    global $conexao;
    $data = json_decode(file_get_contents("php://input"), true);  // Recebendo os dados via PUT

    if (!empty($data['nome']) && !empty($data['login']) && !empty($data['senha'])) {
        $nome = $data['nome'];
        $login = $data['login'];
        $senha = password_hash($data['senha'], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET nome='$nome', login='$login', senha='$senha' WHERE user_id=$id";
        if (mysqli_query($conexao, $sql)) {
            echo json_encode(array('message' => 'Usuário atualizado com sucesso!'));
        } else {
            echo json_encode(array('message' => 'Erro ao atualizar usuário.'));
        }
    } else {
        echo json_encode(array('message' => 'Dados incompletos.'));
    }
}

function deleteUser($id) {
    global $conexao;
    $sql = "DELETE FROM users WHERE user_id = $id";

    if (mysqli_query($conexao, $sql)) {
        echo json_encode(array('message' => 'Usuário deletado com sucesso!'));
    } else {
        echo json_encode(array('message' => 'Erro ao deletar usuário.'));
    }
}
?>
