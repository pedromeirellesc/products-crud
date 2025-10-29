# Products Crud

![PHP Version](https://img.shields.io/badge/PHP-8.3-blue)

CRUD para cadastro de produtos.

- **Laravel**
- **MySQL**
- **Nginx**
- **Docker**
- **Pest**
- **Bootstrap**

### Instalação

1.  **Clone do repositório:**
    ```bash
    git clone https://github.com/pedromeirellesc/products-crud.git
    cd products-crud
    ```

2.  **Copie o arquivo `.env.example` para `.env`:**
    ```bash
    cp .env.example .env
    ```

3.  **Inicie os containers Docker:**
    ```bash
    docker-compose up -d
    ```

4.  **Instale as dependências do Composer:**
    ```bash
    docker-compose exec app composer install
    ```

5.  **Gere a chave aleatória:**
    ```bash
    docker-compose exec app php artisan key:generate
    ```

6.  **Rode as migrations:**
    ```bash
    docker-compose exec app php artisan migrate
    ```

### Acessar a aplicação

-   **URL:** [http://localhost:8000](http://localhost:8000)

### Rodar os testes

Para rodar os testes, execute o seguinte comando dentro do container:
```bash
docker-compose exec app php artisan test
```
