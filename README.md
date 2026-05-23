# 🏀 Sistema NBA

> Sistema web para gerenciamento de times e jogadores da NBA, desenvolvido com PHP puro e arquitetura MVC.

---

## Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Banco de Dados](#-banco-de-dados)
- [Como Executar](#-como-executar)
- [Rotas Disponíveis](#-rotas-disponíveis)
- [Arquitetura MVC](#-arquitetura-mvc)
- [Autora](#-autora)

---

## Sobre o Projeto

O **Sistema NBA** é uma aplicação web desenvolvida em PHP com MySQL, criada com o objetivo de praticar e consolidar conhecimentos em desenvolvimento back-end, banco de dados relacional e arquitetura MVC.

O sistema simula um painel de gerenciamento de franquias e elencos da NBA, permitindo cadastrar, editar, excluir e visualizar times e jogadores de forma organizada e intuitiva.

---

## ✅ Funcionalidades

- 📋 Cadastro, listagem, edição e exclusão de times (CRUD completo)
- 👤 Cadastro, edição e exclusão de jogadores vinculados a times
- 🔍 Filtro por conferência e divisão
- 📄 Paginação da listagem de times
- 🖼️ Exibição automática do logo de cada franquia
- 👥 Visualização do elenco individual por time
- 📊 Dashboard com indicadores gerais do sistema
- 🔗 Relacionamento entre time e jogadores via chave estrangeira

---

## 🛠️ Tecnologias

| Tecnologia | Uso |
|------------|-----|
| PHP        | Linguagem back-end principal |
| MySQL      | Banco de dados relacional |
| PDO        | Abstração de acesso ao banco |
| HTML5      | Estrutura das páginas |
| CSS3       | Estilização e layout responsivo |
| XAMPP      | Ambiente de desenvolvimento local |

---

## 📁 Estrutura do Projeto

```
sistema_nba/
└── nba/
    ├── config/
    │   └── Database.php          # Conexão com o banco de dados
    ├── Controller/
    │   ├── SelecaoController.php # Lógica dos times
    │   └── JogadorController.php # Lógica dos jogadores
    ├── Model/
    │   ├── Selecao.php           # Modelo de time
    │   └── Jogador.php           # Modelo de jogador
    ├── Views/
    │   ├── lista.php             # Listagem de times
    │   ├── create.php            # Formulário de cadastro de time
    │   ├── edit.php              # Formulário de edição de time
    │   ├── elenco.php            # Elenco de um time
    │   ├── jogador-create.php    # Formulário de cadastro de jogador
    │   ├── jogador-edit.php      # Formulário de edição de jogador
    │   └── dashboard.php         # Dashboard geral
    ├── assets/
    │   ├── ball.png
    │   └── fundo.png
    ├── copa_db.sql               # Script de criação do banco
    └── index.php                 # Ponto de entrada da aplicação
```

---

## 🗄️ Banco de Dados

O projeto utiliza duas tabelas principais:

### `selecoes`
| Coluna       | Tipo         | Descrição                     |
|--------------|--------------|-------------------------------|
| id           | INT (PK)     | Identificador único           |
| nome         | VARCHAR(100) | Nome do time (único)          |
| conferencia  | VARCHAR(100) | Conferência (Leste/Oeste)     |
| divisao      | VARCHAR(100) | Divisão do time               |
| titulos      | INT          | Número de títulos da NBA      |
| bandeira     | VARCHAR(500) | URL/caminho do logo           |
| criado_em    | DATETIME     | Data de cadastro              |

### `jogadores`
| Coluna        | Tipo        | Descrição                          |
|---------------|-------------|------------------------------------|
| id            | INT (PK)    | Identificador único                |
| nome          | VARCHAR(100)| Nome do jogador                    |
| posicao       | VARCHAR(50) | Posição em quadra                  |
| numero_camisa | INT         | Número da camisa                   |
| selecao_id    | INT (FK)    | Referência ao time (`selecoes.id`) |

> O relacionamento entre `jogadores` e `selecoes` utiliza `ON DELETE CASCADE` e `ON UPDATE CASCADE`.

---

##  Como Executar

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) instalado (Apache + MySQL)
- Navegador web

### Passo a passo

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/GisseliSilva/sistema_nba.git
   ```

2. **Mova a pasta para o diretório `htdocs` do XAMPP:**
   ```
   C:/xampp/htdocs/sistema_nba
   ```

3. **Inicie o Apache e o MySQL** pelo painel de controle do XAMPP.

4. **Crie o banco de dados:**
   - Acesse `http://localhost/phpmyadmin`
   - Crie um banco chamado `copa_db`
   - Importe o arquivo `nba/copa_db.sql`

5. **Configure as credenciais do banco** em `nba/config/Database.php`:
   ```php
   private $host     = "localhost";
   private $db_name  = "copa_db";
   private $user     = "root";
   private $password = "";
   ```

6. **Acesse a aplicação no navegador:**
   ```
   http://localhost/sistema_nba/nba/
   ```

---

## 🗺️ Rotas Disponíveis

| Rota | Descrição |
|------|-----------|
| `index.php` | Listagem de times |
| `index.php?action=novo` | Formulário de cadastro de time |
| `index.php?action=editar&id={id}` | Editar um time |
| `index.php?action=deletar&id={id}` | Excluir um time |
| `index.php?action=elenco&selecao_id={id}` | Elenco de um time |
| `index.php?action=novo-jogador&selecao_id={id}` | Cadastrar jogador |
| `index.php?action=editar-jogador&id={id}` | Editar jogador |
| `index.php?action=atualizar-jogador` | Salvar edição de jogador |
| `index.php?action=dashboard` | Dashboard geral |

---

## 🏗️ Arquitetura MVC

O projeto segue o padrão **Model–View–Controller**:

- **Model** — Responsável pela comunicação com o banco de dados; encapsula as queries SQL e regras de persistência.
- **Controller** — Recebe as requisições via `index.php`, aplica a lógica de negócio e decide qual view renderizar.
- **View** — Renderiza a interface do usuário com os dados processados pelo controller.


[![GitHub](https://img.shields.io/badge/GitHub-GisseliSilva-181717?style=flat&logo=github)](https://github.com/GisseliSilva)
