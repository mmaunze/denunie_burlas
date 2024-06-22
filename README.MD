# Sistema de Gestão Empresarial ERP (empresis) - API

Este projeto é uma API desenvolvida em Spring Boot para um sistema ERP completo. A API fornece todas as funcionalidades necessárias para a gestão de uma empresa, desde gestão de clientes e fornecedores até controle financeiro e de estoque. O banco de dados utilizado é o PostgreSQL.

## Índice

1. [Visão Geral](#visão-geral)
2. [Funcionalidades](#funcionalidades)
   - [Gestão de Usuários](#gestão-de-usuários)
   - [Gestão de Clientes e Fornecedores](#gestão-de-clientes-e-fornecedores)
   - [Gestão de Produtos e Estoque](#gestão-de-produtos-e-estoque)
   - [Gestão de Vendas e Compras](#gestão-de-vendas-e-compras)
   - [Gestão Financeira](#gestão-financeira)
   - [Relatórios](#relatórios)
3. [Tecnologias Utilizadas](#tecnologias-utilizadas)
4. [Pré-requisitos](#pré-requisitos)
5. [Configuração e Instalação](#configuração-e-instalação)
6. [Estrutura do Projeto](#estrutura-do-projeto)
7. [Contribuição](#contribuição)

## Visão Geral

Este projeto é uma API para um ERP completo desenvolvido com Spring Boot e PostgreSQL. Ele foi projetado para fornecer uma solução robusta e escalável para a gestão empresarial, com foco em eficiência e facilidade de uso.

## Funcionalidades

### Gestão de Usuários

- **Cadastro e autenticação de usuários**: administração, funcionários e clientes.
- **Gerenciamento de permissões e funções**: controle detalhado das permissões de acesso com base nas funções dos usuários.
- **Perfis de usuários**: gerenciamento de informações pessoais, fotos de perfil, dados de contato e preferências.

### Gestão de Clientes e Fornecedores

- **Cadastro de clientes e fornecedores**:
  - Informações detalhadas de contato.
  - Histórico de interações e transações.
- **Gerenciamento de contratos e acordos**:
  - Criação e acompanhamento de contratos.
  - Notificações de renovação e vencimento.

### Gestão de Produtos e Estoque

- **Cadastro e gerenciamento de produtos**:
  - Informações detalhadas de produtos.
  - Categorização e organização de produtos.
- **Controle de estoque**:
  - Registro de entradas e saídas de produtos.
  - Relatórios de níveis de estoque.
  - Notificações de reposição.

### Gestão de Vendas e Compras

- **Processamento de vendas**:
  - Criação e gerenciamento de pedidos de venda.
  - Faturamento e emissão de notas fiscais.
- **Processamento de compras**:
  - Criação e gerenciamento de pedidos de compra.
  - Recebimento e verificação de mercadorias.

### Gestão Financeira

- **Controle de contas a pagar e a receber**:
  - Registro e acompanhamento de pagamentos e recebimentos.
  - Emissão de faturas e boletos.
- **Gestão de fluxo de caixa**:
  - Monitoramento de entradas e saídas de dinheiro.
  - Relatórios financeiros detalhados.
- **Planejamento e orçamento**:
  - Criação de orçamentos e acompanhamento de despesas.

### Relatórios

- **Relatórios personalizados**:
  - Criação de relatórios customizados conforme a necessidade.
  - Exportação de relatórios em vários formatos (PDF, Excel, etc.).
- **Dashboard de indicadores**:
  - Visualização gráfica de métricas chave.
  - Monitoramento de performance em tempo real.

## Tecnologias Utilizadas

- **Spring Boot**: Framework principal para o desenvolvimento da API.
- **JPA/Hibernate**: Para gerenciamento de banco de dados.
- **Spring Security**: Para autenticação e autorização.
- **JWT**: Para gerenciamento de tokens de segurança.
- **PostgreSQL**: Como banco de dados relacional.
- **Maven**: Para gerenciamento de dependências.
- **Swagger**: Para documentação da API.
- **Docker**: Para contêinerização da aplicação.

## Pré-requisitos

- **Java 11** ou superior.
- **Maven 3.6.3** ou superior.
- **PostgreSQL 12** ou superior.
- **Docker** (opcional, para contêinerização).

## Configuração e Instalação

### Clone o Repositório

```bash
git clone https://github.com/usuario/nome-do-repositorio.git
cd nome-do-repositorio
```

### Configuração do Banco de Dados

Crie um banco de dados no PostgreSQL. Configure o arquivo `application.properties` com as informações de conexão do banco de dados:

```properties
spring.datasource.url=jdbc:postgresql://localhost:5432/nome_do_banco
spring.datasource.username=usuario
spring.datasource.password=senha
spring.jpa.hibernate.ddl-auto=update
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.PostgreSQLDialect
```

### Executando a Aplicação

Com o Maven configurado, você pode executar a aplicação usando o seguinte comando:

```bash
mvn spring-boot:run
```

A API estará disponível em `http://localhost:8080`.

### Documentação da API

A documentação da API pode ser acessada através do Swagger em `http://localhost:8080/swagger-ui.html`.

## Estrutura do Projeto

```plaintext
src/
├── main/
│   ├── java/com/erp/
│   │   ├── controller/   # Controladores REST
│   │   ├── model/        # Modelos de dados
│   │   ├── repository/   # Repositórios JPA
│   │   ├── service/      # Serviços de negócio
│   │   ├── config/       # Configurações de segurança e outros
│   │   └── ErpApplication.java  # Classe principal
│   └── resources/
│       ├── application.properties  # Configurações da aplicação
│       ├── data.sql                # Dados iniciais (opcional)
│       └── schema.sql              # Esquema de banco de dados (opcional)
└── test/
    └── java/com/erp/  # Testes unitários e de integração
```

## Contribuição

Contribuições são bem-vindas! Siga os passos abaixo para contribuir com o projeto:

1. Fork o repositório.
2. Crie uma nova branch (`git checkout -b minha-branch`).
3. Faça suas alterações e comente (`git commit -m 'Minha contribuição'`).
4. Envie para o repositório remoto (`git push origin minha-branch`).
5. Abra um Pull Request.
