FROM mysql:latest

# Copiar o arquivo SQL com os comandos de criação de tabela e inserção de dados para o contêiner
# COPY mysqldumping.sql /docker-entrypoint-initdb.d

# Definir as variáveis de ambiente para o MySQL
ENV MYSQL_ROOT_PASSWORD 1234
ENV MYSQL_DATABASE laravel_shop

# Expor a porta 3307 do contêiner
EXPOSE 3306
