***COMO RODAR O LIBRANDO
cd Backend
composer install

# 4. Crie o arquivo de ambiente a partir do template
copy .env.example .env

# 5. Gere a chave da aplicacao
php artisan key:generate

# 6. Configure o banco de dados no arquivo .env
#    Edite o arquivo Backend/.env com as seguintes configuracoes:
#    DB_CONNECTION=mysql
#    DB_HOST=127.0.0.1
#    DB_PORT=3307
#    DB_DATABASE=sige
#    DB_USERNAME=root
#    DB_PASSWORD=       

# 7. Crie o banco de dados no MySQL
#    Acesse o MySQL e execute: CREATE DATABASE librando;

# 8. Limpe o cache de configuracao (importante em ambientes novos)
php artisan config:clear
php artisan cache:clear

# 9. Execute as migrations (cria as tabelas)
php artisan migrate

# 10. Execute os seeders (popula o banco com dados de desenvolvimento) - OBRIGATORIO!
php artisan db:seed

# 11. Inicie o servidor Backend
php artisan serve
#    O servidor ira rodar em: http://localhost:8000

# 12. Em outro terminal, instale as dependencias do Frontend
cd ../Frontend
npm install
npm install lucide-vue-next

# 13. Inicie o servidor de desenvolvimento do Frontend
npm run dev
