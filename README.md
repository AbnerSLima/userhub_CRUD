# UserHub System

Um sistema simples de gerenciamento de usuários, implementado com PHP e MySQL, utilizando Bootstrap para o layout. Este projeto também inclui uma API REST básica para interação com os dados. Em breve, a API estará online para que você possa consumir os dados sem necessidade de um banco de dados local.

---

## 📜 Descrição

O **UserHub** é um sistema CRUD (Create, Read, Update, Delete) que permite gerenciar usuários de forma intuitiva. Este projeto foi desenvolvido para estudos e demonstração de habilidades práticas em desenvolvimento web com PHP e MySQL.  

No futuro, o projeto será atualizado para consumir dados diretamente de uma API hospedada online, eliminando a necessidade de um banco de dados local.

---

## 🚀 Tecnologias Utilizadas

- **PHP**: Linguagem principal para back-end.
- **HTML**: Estruturação das páginas do sistema.
- **Bootstrap**: Framework CSS para criar o layout responsivo.
- **MySQL**: Banco de dados relacional para armazenar os dados.
- **XAMPP/WAMP**: Ferramentas para hospedar o projeto localmente.
- **API REST**: Implementação inicial para acesso aos dados do sistema.

---

## 🛠️ Como Executar o Projeto Localmente

### Pré-requisitos

1. Instale o [XAMPP](https://www.apachefriends.org/index.html) ou [WampServer](https://www.wampserver.com/).
2. Baixe e instale um cliente para interagir com o banco de dados, como o **phpMyAdmin** (já incluso no XAMPP/WampServer).

### Configuração do Banco de Dados

1. Inicie o Apache e o MySQL no XAMPP ou no WampServer.
2. Acesse o **phpMyAdmin** em `http://localhost/phpmyadmin/`.
3. Execute o comando SQL fornecido no arquivo userhub.sql em sua ferramenta de gerenciamento de banco de dados local (como phpMyAdmin, DBeaver ou MySQL Workbench) para criar o banco de dados, as tabelas e o usuário administrador.

#### Usuário e Senha Padrão
- **Usuário**: `admin`
- **Senha**: `admin`

> **Recomendação:** Altere a senha do usuário administrador após a configuração inicial para garantir a segurança do sistema.

### Configuração do Projeto

1. Clone este repositório em sua máquina:
   ```bash
   git clone https://github.com/seu-usuario/userhub.git
2. Coloque os arquivos na pasta htdocs (XAMPP) ou www (WampServer). Exemplo:
   ```bash
   C:\xampp\htdocs\userhub
3. Configure o arquivo de conexão com o banco de dados:
- Abra conexao.php e ajuste os valores conforme seu ambiente local:
   ```bash
   define('HOST', '127.0.0.1');
   define('USUARIO', 'root');
   define('SENHA', '');
   define('DB', 'userhub');

### Executando o Sistema

1. Abra seu navegador e acesse:
   ```bash
   http://localhost/userhub
3. Faça login utilizando o **usuário padrão**:
- **Usuário**: `admin`
- **Senha**: `admin`
5. Após o login, você poderá explorar o sistema e criar novos usuários se desejar.

## 📡 Futuras Atualizações
- API Online: A API será hospedada em um servidor online, permitindo que desenvolvedores consumam os dados diretamente.
- Integração com API: O projeto será atualizado para consumir dados da API em vez de um banco de dados local.

## 📄 Licença
Este projeto é de código aberto e está sob a licença MIT. Sinta-se à vontade para usá-lo e modificá-lo.
