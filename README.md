# Como Rodar o Librando

## 1. Acessar a pasta do Backend

Abra o terminal do VS Code e execute:

```bash
cd Backend
```

## 2. Instalar as dependências do Laravel

```bash
composer install
```

## 3. Criar o arquivo de ambiente

Crie o arquivo `.env` a partir do modelo:

```bash
copy .env.example .env
```

## 4. Gerar a chave da aplicação

```bash
php artisan key:generate
```

## 5. Configurar o banco de dados

Abra o arquivo:

```text
Backend/.env
```

Configure a conexão com o MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=librando
DB_USERNAME=root
DB_PASSWORD=
```

> **Observação:** a porta (`3307`) deve ser a mesma utilizada pelo MySQL do XAMPP. Se o seu MySQL estiver utilizando a porta `3306`, altere esse valor.

## 6. Criar o banco de dados

No **phpMyAdmin** ou no **MySQL Workbench**, execute:

```sql
CREATE DATABASE librando;
```

Depois, selecione o banco `librando`.

## 7. Limpar o cache de configuração

No terminal, execute:

```bash
php artisan config:clear
php artisan cache:clear
```

Isso garante que o Laravel utilize as configurações atuais do arquivo `.env`.

## 8. Executar as migrations

As migrations criarão automaticamente as tabelas necessárias no banco:

```bash
php artisan migrate
```

## 9. Executar os seeders

Os seeders inserem os dados de desenvolvimento no banco:

```bash
php artisan db:seed
```

> **Importante:** execute este comando para criar os dados iniciais necessários para os testes.

## 10. Iniciar o Backend

```bash
php artisan serve
```

O Laravel ficará disponível em:

```text
http://localhost:8000
```

---

# Frontend

Abra **outro terminal** no VS Code e acesse a pasta do frontend:

```bash
cd ../Frontend
```

## 11. Instalar as dependências

```bash
npm install
```

Instale também o pacote de ícones utilizado pelo projeto:

```bash
npm install lucide-vue-next
```

## 12. Iniciar o Frontend

```bash
npm run dev
```

O Vite exibirá no terminal o endereço para acessar a aplicação, normalmente:

```text
http://localhost:5173
```

---

# Resumo

Para executar o projeto, serão necessários **dois terminais**:

### Terminal 1 — Backend

```bash
cd Backend
composer install
php artisan serve
```

### Terminal 2 — Frontend

```bash
cd Frontend
npm install
npm install lucide-vue-next
npm run dev
```

### Banco de dados

O MySQL deve estar em execução pelo **XAMPP**, com o banco:

```text
librando
```

e configurado no arquivo:

```text
Backend/.env
```
