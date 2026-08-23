# 📝 Notes

Aplicação web desenvolvida com **Laravel** para gerenciamento de notas, permitindo que usuários autenticados possam criar, visualizar, atualizar e excluir registros.

O projeto foi desenvolvido durante um **curso de Laravel na Udemy**, com o objetivo de colocar em prática, de forma introdutória, os principais fundamentos do framework.

---

## 🎯 Objetivo

O principal objetivo do projeto foi compreender os fundamentos do **Laravel** através do desenvolvimento de uma aplicação prática.

Durante o desenvolvimento, foram estudados conceitos relacionados à estrutura MVC, gerenciamento de rotas, criação de controllers e views, integração com banco de dados e operações CRUD utilizando o Eloquent ORM.

> **Observação:** este é um projeto de estudo, desenvolvido de forma introdutória para consolidar os fundamentos do Laravel.

---

## 🚀 Funcionalidades

- 🔐 Sistema de login
- 👤 Diferentes tipos de usuários
- 📝 Cadastro de notas
- 📖 Visualização de notas
- ✏️ Atualização de notas
- 🗑️ Exclusão de notas
- ♻️ Soft Delete
- 🗑️ Hard Delete
- 🔒 Hash/criptografia de informações sensíveis
- 🗄️ Persistência de dados utilizando MySQL

---

## 📚 Conceitos estudados

Durante o desenvolvimento do projeto, foram praticados os seguintes conceitos do Laravel:

### Routes

Definição das rotas da aplicação e direcionamento das requisições para os respectivos controllers.

### Controllers

Organização da lógica responsável pelo processamento das requisições e comunicação entre as diferentes partes da aplicação.

### Views e Blade

Criação das interfaces utilizando o sistema de templates **Blade** do Laravel.

### Blade Layouts

Utilização de layouts para reutilização de estruturas comuns entre diferentes páginas da aplicação.

### MySQL

Integração da aplicação com um banco de dados MySQL para armazenamento das informações.

### Migrations

Criação e gerenciamento da estrutura das tabelas do banco de dados através das migrations do Laravel.

### Seeders

Inserção de dados iniciais no banco de dados para facilitar o desenvolvimento e os testes da aplicação.

### Eloquent ORM

Utilização do **Eloquent ORM** para interação com o banco de dados através dos Models.

### CRUD

Implementação das operações fundamentais:

- **Create** — criação de registros
- **Read** — leitura de registros
- **Update** — atualização de registros
- **Delete** — exclusão de registros

### Soft Delete e Hard Delete

Implementação dos conceitos de exclusão lógica (**Soft Delete**) e exclusão permanente (**Hard Delete**) dos registros.

### Autenticação

Implementação de um sistema básico de login para controle de acesso à aplicação.

---

## 🛠️ Tecnologias utilizadas

<p align="left">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Blade">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
  <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
</p>

---

## 🏗️ Arquitetura

O projeto utiliza a arquitetura **MVC (Model-View-Controller)** do Laravel.

```text
app/
├── Http/
│   └── Controllers/
│
└── Models/

database/
├── migrations/
└── seeders/

resources/
└── views/
    ├── layouts/
    └── ...

routes/
└── web.php
