FROM php:8.1-apache

# Instala extensões necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos do projeto para o container
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html/

# Define permissões
RUN chown -R www-data:www-data /var/www/html/

# Configurações do Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
