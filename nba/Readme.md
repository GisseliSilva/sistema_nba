# Sistema NBA

Sistema web desenvolvido em PHP + MySQL com arquitetura MVC, voltado para o cadastro e gerenciamento de times da NBA e seus jogadores.

## Funcionalidades

- Cadastro de times da NBA.
- Listagem de times cadastrados.
- Edição e exclusão de times.
- Filtro por conferência e divisão.
- Paginação da listagem.
- Exibição automática do logo do time.
- Visualização do elenco de cada time.
- Cadastro, edição e exclusão de jogadores.
- Dashboard com indicadores gerais do sistema.

## Tecnologias utilizadas

- PHP
- MySQL
- PDO
- HTML5
- CSS3
- CRUD
- Arquitetura MVC

## Estrutura do projeto

```bash
sistema_nba/
├── config/
│   └── Database.php
│   └── helpers.php
├── Controller/
│   ├── SelecaoController.php
│   └── JogadorController.php
├── Model/
│   ├── Selecao.php
│   └── Jogador.php
├── Views/
│   ├── lista.php
│   ├── create.php
│   ├── edit.php
│   ├── elenco.php
│   ├── jogador-create.php
│   ├── jogador-edit.php
│   └── dashboard.php
├── assets/
├── nba_db.sql
├── index.php
├── Readme.md
└── Roadmap.md
```

## Objetivo do projeto

Este projeto foi criado com o propósito de consolidar conhecimentos em desenvolvimento web back-end com PHP, utilizando banco de dados relacional MySQL e organização baseada na arquitetura MVC. A proposta é simular um sistema de gerenciamento de times e jogadores da NBA de forma estruturada, funcional e com interface visual moderna.

## Como executar o projeto

1. Clone ou baixe este repositório.
2. Mova a pasta do projeto para dentro do diretório `htdocs` do XAMPP.
3. Crie o banco de dados no MySQL via phpMyAdmin.
4. Importe o arquivo SQL disponível na raiz do projeto.
5. Ajuste as credenciais de acesso ao banco em `config/Database.php`.
6. Inicie os serviços Apache e MySQL no painel do XAMPP.
7. Acesse pelo navegador:

```txt
http://localhost/sistema_nba/
```

## Configuração do banco

No arquivo `config/Database.php`, defina as credenciais:

```php
private $host = "localhost";
private $db_name = "nba_db";
private $user = "root";
private $password = "";
```

## Rotas principais

| Rota | Descrição |
|------|-----------|
| `index.php` | Lista os times |
| `index.php?action=novo` | Formulário de cadastro de time |
| `index.php?action=editar&id=1` | Edita um time |
| `index.php?action=deletar&id=1` | Exclui um time |
| `index.php?action=elenco&selecao_id=1` | Exibe o elenco do time |
| `index.php?action=novo-jogador&selecao_id=1` | Formulário de cadastro de jogador |
| `index.php?action=atualizar-jogador` | Atualiza dados de um jogador |
| `index.php?action=dashboard` | Exibe o dashboard geral |

## Organização MVC

### Model
Centraliza a comunicação com o banco de dados, encapsulando as consultas SQL e as regras de persistência dos dados.

### Controller
Recebe as requisições HTTP, aplica a lógica de negócio e repassa os dados processados para as views correspondentes.

### View
Renderiza a interface do usuário, exibindo tabelas, formulários e informações de forma visual e organizada.

## Recursos implementados

- CRUD completo de times.
- CRUD de jogadores vinculados aos times.
- Relacionamento entre time e elenco via chave estrangeira.
- Carregamento automático do logo de cada franquia.
- Tela de elenco individual por time.
- Layout responsivo e temático desenvolvido com HTML e CSS.
- Dashboard com resumo dos dados cadastrados.
