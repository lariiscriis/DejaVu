# Dejavu - E-commerce de Vinis

<p align="center"> <img src="assets/images/deja_vu 1.svg"></p>

`Dejavu` é um e-commerce fictício desenvolvido para a venda de vinis antigos e modernos com um design retrô. O sistema permite que os usuários façam compras, se registrem, façam login, e gerenciem suas informações.
Além disso, o projeto inclui uma página de administração para gerenciar produtos. O site foi desenvolvido utilizando PHP, MySQL, JavaScript, e hospedado localmente com XAMPP/USBwebserver.

---

## Funcionalidades

### 1. **Cadastro e Login de Usuários**

- Os usuários podem criar uma conta e fazer login para acessar sua área de compras.
- O login é feito através de sessões PHP, e as informações de login são armazenadas no banco de dados MySQL.
- O sistema de autenticação é seguro, com validação de campos e controle de sessão para garantir a segurança.

### 2. **Carrinho de Compras**

- O carrinho de compras permite que os usuários adicionem vinis ao carrinho, visualizem o total e finalizem a compra.
- As informações do carrinho são armazenadas em sessões, garantindo que os itens permaneçam enquanto o usuário navega pela página.

### 3. **Página de Administrador**

- A página de administração permite que o administrador gerencie os vinis no estoque, incluindo a adição, edição e remoção de vinis.

### 4. **Sistema de Pagamento**

- O sistema de pagamento é `simulado`.
- Os usuários podem finalizar a compra e visualizar os detalhes do pagamento.

### 5. **Conexão com Banco de Dados**

- O projeto utiliza MySQL para armazenar dados de usuários, pedidos e produtos.
- As conexões com o banco de dados são feitas utilizando PDO, garantindo segurança e flexibilidade nas operações.

---

## Tecnologias Utilizadas

- **Frontend**: HTML, CSS, JavaScript (para interatividade do site e manipulação do carrinho de compras).
- **Backend**: PHP (para manipulação de sessões, login, cadastro, e integração com o banco de dados).
- **Banco de Dados**: MySQL (armazenamento de usuários, vinis, pedidos e dados administrativos).
- **Servidor Local**: XAMPP ou USBwebserver (para configurar o ambiente de desenvolvimento com Apache e MySQL).
- **Ferramentas de Desenvolvimento**: VS Code (para edição de código), PHPMyAdmin (para gerenciamento de banco de dados).

---

## Estrutura do Banco de Dados

O banco de dados do Dejavu é composto por diversas tabelas principais, incluindo:

- **clientes**: Armazena as informações dos usuários (nome, email, senha).
- **vinil**: Contém informações sobre os vinis (nome, artista, preço, quantidade em estoque, imagem).
- **pedido_pagamento**: Armazena os pedidos realizados pelos clientes, incluindo o status do pedido e o total.

---

## Como Rodar o Projeto

### 1. **Requisitos**

- [XAMPP](https://www.apachefriends.org/index.html) ou [USBWebserver](https://usbwebserver.yura.mk.ua/)instalado no seu computador.
- PHP 7.4 ou superior.
- MySQL.

- ### 2. **Email e senha para acessar a página de Administrador**
- `Email:` adm123@gmail.com;
- `Senha`: 123.

### 3. **Passos para Configuração**

1. Clone o repositório do projeto ou baixe os arquivos.
2. Coloque os arquivos na pasta `htdocs` do XAMPP ou na pasta `root` do USBwebserver.
3. Abra o **phpMyAdmin** e crie um novo banco de dados chamado `db_dejavu`.
4. Importe o arquivo SQL presente na pasta `bancoDeDados`do projeto para criar as tabelas.
5. Configure as credenciais de acesso ao banco de dados no arquivo de configuração (`conexao.php`):
   ```php
   <?php
   $host = 'localhost:3306'; // Porta do servidor MySQL (geralmente apenas 'localhost' no XAMPP)
   $dbname = 'db_dejavu'; // Nome do banco de dados
   $username = 'root'; // Nome de usuário do banco de dados
   $password = 'usbw'; // Senha do banco de dados (geralmente vazia no XAMPP)
   ```
