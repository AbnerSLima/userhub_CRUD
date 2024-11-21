-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS userhub;

-- Usar o banco de dados criado
USE userhub;

-- Criar a tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir o usuário padrão admin
INSERT INTO users (nome, login, senha) VALUES
('Administrador', 'admin', '$2y$10$CwTycUXWue0Thq9StjUM0uJ8jxS2dshTpoIJ8slGLkJpYzT0N9GLa'); -- Senha: admin

-- Exibir a tabela de usuários para verificação
SELECT * FROM users;
