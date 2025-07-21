# 🚗 Sistema de Busca de Carros para Aluguel

Este projeto é uma aplicação web que simula um sistema de busca e filtragem para aluguel de carros, desenvolvida com **Laravel Livewire** e empacotada em um ambiente de desenvolvimento **Docker**.

O projeto demonstra a implementação de filtros combinados e persistentes, paginação e uma estrutura de código organizada.

---

## ✨ Funcionalidades

- **Busca por Nome do Carro**  
  Pesquisa dinâmica em tempo real, filtrando carros pelo nome.

- **Filtro por Categoria**  
  Filtra veículos por uma ou mais categorias (ex: Sedan, SUV, Esportivo, Elétrico).

- **Filtro por Marca**  
  Filtra veículos por uma ou mais marcas (ex: Toyota, BMW, Ford).

- **Filtros Combinados**  
  Aplica todos os filtros simultaneamente (Nome, Categoria e Marca).

- **Múltipla Seleção**  
  Permite selecionar várias categorias e/ou marcas ao mesmo tempo.

- **Persistência de Filtros**  
  Os filtros são mantidos na URL (query string), permitindo compartilhar e recarregar a busca.

- **Limpar Filtros**  
  Botão dedicado para redefinir todos os campos de pesquisa.

- **Paginação**  
  Resultados paginados para melhorar a performance e usabilidade.

- **Dados Realistas**  
  Banco populado com dados fictícios baseados em marcas, categorias e nomes de carros reais.

---

## 🛠️ Tecnologias Utilizadas

- **Laravel 12.x**
- **Livewire 3.x**
- **MySQL 8.0**
- **Docker & Docker Compose**
- **PHP 8.2**
- **Composer**
- **NPM**
- **Tailwind CSS (via CDN)**
- **PHPUnit / PestPHP**

---

---

## 🚀 Como Rodar o Projeto

Siga estes passos para configurar e executar o projeto em sua máquina local.

### Pré-requisitos

Certifique-se de ter o **Docker Desktop** (ou Docker Engine e Docker Compose) instalado e funcionando em seu sistema operacional (Windows, macOS ou Linux).

### Configuração e Instalação

1.  **Clone o Repositório:**

    ```bash
    git clone git@github.com:marcelowillyan/car-rental-search.git
    cd car-rental-search
    ```

2.  **Subir os Contêineres Docker:**
    Este comando irá construir as imagens (se necessário) e iniciar os serviços (`app`, `db`, `phpmyadmin`).

    ```bash
    docker-compose up -d --build
    ```
    Aguarde o processo de construção e inicialização terminar. Pode levar alguns minutos na primeira vez.

3.  **Verificar Status dos Serviços:**
    Confirme se todos os serviços estão rodando:

    ```bash
    docker-compose ps
    ```
    Todos devem estar com o `State` como `Up`.

4.  **Acessar o Contêiner da Aplicação:**
    Para executar comandos Laravel e Composer, você precisará acessar o shell do contêiner da aplicação:

    ```bash
    docker-compose exec app sh
    ```
    *(Você verá o prompt do terminal mudar para `/var/www/html #` ou similar.)*

5.  **Instalar Dependências PHP e Node.js:**
    *(**Nota:** O projeto já vem com a estrutura Laravel completa. Apenas instale as dependências.)*

    ```bash
    composer install
    npm install
    ```

6.  **Executar Migrações e Popular o Banco de Dados:**
    Este comando irá criar todas as tabelas do banco de dados (incluindo a de sessões do Laravel) e preenchê-las com dados de exemplo de carros, marcas e categorias.

    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Sair do Contêiner:**

    ```bash
    exit
    ```

---

## 🌐 Acesso à Aplicação

Com o ambiente pronto e o banco de dados populado, você pode acessar:

* **Aplicação Laravel:** Abra seu navegador web e acesse:
    👉 [http://localhost:8000](http://localhost:8000)
