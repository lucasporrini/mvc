# Utilisez l'image de base PHP avec Apache
FROM php:apache

# Installez les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql

# Copiez vos fichiers sources de l'API dans le conteneur
COPY src/ /var/www/html/

# Activez le mod_rewrite pour Apache (si nécessaire)
RUN a2enmod rewrite
# Pour pouvoir utiliser la commande ping dans le conteneur
RUN apt-get update && apt-get install -y iputils-ping

# Exposez le port 80 (Apache)
EXPOSE 80
