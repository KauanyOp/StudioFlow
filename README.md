# StudioFlow – Sistema de Gestão de Atendimentos

Sistema web desenvolvido para gerenciamento de atendimentos em estúdios de tatuagem, permitindo o controle de profissionais, clientes, serviços e agendamentos em uma plataforma centralizada.

O projeto foi desenvolvido como Projeto Integrador, simulando um ambiente real de negócio e aplicando conceitos de desenvolvimento web, banco de dados relacionais, autenticação de usuários e organização de sistemas em camadas.

* Gerenciamento de profissionais

* Controle de agendamentos

* Dashboard administrativo

* Histórico de atendimentos

* Autenticação segura de usuários

---

## Funcionalidades

### Autenticação e Controle de Acesso

* Login e logout de usuários
* Cadastro de profissionais
* Controle de sessão com PHP
* Senhas armazenadas de forma segura utilizando `password_hash()`
* Validação de credenciais com `password_verify()`

### Gestão de Profissionais

* Cadastro de profissionais
* Edição de informações
* Controle de status (ativo/inativo)
* Gerenciamento centralizado

### Gestão de Agendamentos

* Criação de atendimentos
* Atualização de status
* Visualização em calendário
* Histórico completo dos atendimentos

### Dashboard Administrativo

* Visualização de métricas
* Acompanhamento dos atendimentos
* Navegação centralizada entre os módulos

### Estrutura do Banco de Dados

* Modelagem relacional utilizando MySQL
* Relacionamentos entre clientes, profissionais, serviços e agendamentos
* Integridade referencial por meio de chaves estrangeiras
* 
---

## Tecnologias Utilizadas

### Front-end: HTML, CSS e JavaScript

### Back-end: PHP

### Banco de Dados: MySQL

### Ferramentas: Git, GitHub e XAMPP

---

## Arquitetura do Projeto

```text
StudioFlow/
├── assets/
│   ├── css/                 # Folhas de estilo da aplicação
│   └── img/                 # Imagens, ícones e recursos visuais
│
├── backend/                 # Lógica de negócio e integração com banco
│
├── data/                    # Scripts SQL e modelo do banco de dados
│
└── frontend/                # Interface do sistema
    ├── admin/               # Área administrativa
    │   ├── dashboard.php
    │   ├── calendario.php
    │   ├── historico.php
    │   └── demais módulos administrativos
    │
    ├── index.php            # Página inicial
    ├── login.php            # Tela de autenticação
    ├── cadastro.php         # Cadastro de usuários
    ├── confirmacao.php      # Confirmação de Agendamento
    └── form-confirmação     # Formulários de Agendamento
```

O projeto foi estruturado com separação de responsabilidades entre interface, regras de negócio e persistência de dados, facilitando manutenção, escalabilidade e organização do código.

---

## Conceitos Aplicados

Durante o desenvolvimento foram aplicados conceitos importantes de engenharia de software, tais como:

* CRUD completo
* Modelagem de banco de dados relacional
* Autenticação e autorização
* Controle de sessão
* Validação de formulários
* Tratamento de erros
* Organização em camadas
* Versionamento com Git
* Responsividade

---

## Como Executar

1. Clone o repositório:
```bash
git clone https://github.com/KauanyOp/StudioFlow.git
```

2. Mova a pasta do projeto para o diretório `htdocs` do XAMPP.

3. Inicie os serviços **Apache** e **MySQL** pelo painel do XAMPP.

4. Crie um banco de dados chamado `studioflow` no phpMyAdmin e importe o arquivo:
```text
data/bd.sql
```

5. Acesse o sistema pelo navegador:
```text
http://localhost/StudioFlow
```
---

## Desenvolvido por

### Kauany Oliveira

GitHub: https://github.com/KauanyOp

### Giovanna Rodrigues

GitHub: https://github.com/giovannarodrigues1

