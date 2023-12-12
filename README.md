
# Docker Gestion

Quelques mémos des commandes Docker

## Configuration de base

### docker-compose.yml

Ce fichier doit être à la racine du projet

```bash
version: '3'

services:
  # Service MySQL
  mysql:
    image: mysql:latest
    environment:
      MYSQL_ROOT_PASSWORD: password  # Remplacez par votre mot de passe
      MYSQL_DATABASE: my_database    # Nom de votre base de données
    volumes:
      - mysql_data:/var/lib/mysql
    ports:
      - "3306:3306"

  # Service pour l'application web
  web:
    build: ./web
    ports:
      - "8080:80"  # Port externe:interne
    volumes:
      - ./web/src:/var/www/html

  # Service pour l'API
  api:
    build: ./api
    ports:
      - "3001:80"  # Port externe:interne
    volumes:
      - ./api/src:/var/www/html
    depends_on:
      - mysql

  # phpMyAdmin pour la gestion de la base de données
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    ports:
      - "8081:80"
    environment:
      PMA_HOST: mysql
      PMA_USER: root
      PMA_PASSWORD: password  # Utilisez le même mot de passe que pour MySQL
      PMA_DATABASE: ressourcerie # Nom de votre base de données
    depends_on:
      - mysql

volumes:
  mysql_data:
```

### Dockerfile

Les "Dockerfile" sont à enregistrer et à configurer dans le folder qui représenteront les containers.
Voici un eexemple d'arborescence :

```bash
api/
├── Dockerfile
└── src/
    └── racine de mon container "api" (code du container)
web/
├── Dockerfile
└── src/
    └── racine de mon container "web" (code du container)
docker-compose.yml
README/md
```

Ici, les dossier "src" ne sont pas nommé par hasard, ils ont été configurés dans le Dockerfile respectifs :

Dockerfile (web):

```bash
# Utilisez l'image de base PHP avec Apache
FROM php:apache

# Installez les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql

# Copiez vos fichiers sources dans le conteneur
COPY src/ /var/www/html/

# Activez le mod_rewrite pour Apache (si nécessaire)
RUN a2enmod rewrite
# Pour pouvoir utiliser la commande ping dans le conteneur
RUN apt-get update && apt-get install -y iputils-ping

# Exposez le port 80 (Apache)
EXPOSE 80
```

Dockerfile (api):

```bash
# Utilisez l'image de base PHP avec Apache
FROM php:apache

# Installez les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql

# Copiez vos fichiers sources dans le conteneur
COPY src/ /var/www/html/

# Activez le mod_rewrite pour Apache (si nécessaire)
RUN a2enmod rewrite
# Pour pouvoir utiliser la commande ping dans le conteneur
RUN apt-get update && apt-get install -y iputils-ping

# Exposez le port 80 (Apache)
EXPOSE 80
```
## Mémos des commandes

Mémos utiles sur le fonctionnellement et les commandes Docker

### Création de l'image Docker

```bash
docker-compose build
```

### Lancement des images Docker

```bash
docker-compose up -d
```

### Arrête des images docker

```bash
docker-compose down
    OR
docker-compose stop
```

### Arrête des images Docker avec leur suppression

```bash
docker-compose down --rmi all
```

### Récapitulatif des iimages en cours d'exécution

```bash
docker ps
```

Retour attendu :

| CONTAINER ID | IMAGE                  | COMMAND                  | CREATED          | STATUS          | PORTS                                         | NAMES               |
|--------------|------------------------|--------------------------|------------------|-----------------|-----------------------------------------------|---------------------|
| 660c8e78b035 | phpmyadmin/phpmyadmin  | "/docker-entrypoint.…"   | About a minute ago | Up About a minute | 0.0.0.0:8081->80/tcp                         | appmain-phpmyadmin-1 |
| 3caa8ccd3b8b | appmain-api            | "docker-php-entrypoi…"   | About a minute ago | Up About a minute | 80/tcp, 0.0.0.0:3001->80/tcp               | appmain-api-1        |
| 1bb9b6d07c82 | appmain-web            | "docker-php-entrypoi…"   | About a minute ago | Up About a minute | 0.0.0.0:8080->80/tcp                         | appmain-web-1        |
| a42811455fc8 | mysql:latest           | "docker-entrypoint.s…"   | About a minute ago | Up About a minute | 0.0.0.0:3306->3306/tcp, 33060/tcp            | appmain-mysql-1      |


### Rentrer dans la CLI du container

```bash
docker exec [nom_du_container] [type_d_interface]
```

Dans ce cas, les noms sont définis dans notre docker-compose.yml (api, web, mysql et phpmyadmin).

Ouvrir la CLI du container "web" avec "shell" :

```bash
docker exec web sh
```

Ouvrir la CLI du container "api" avec "bash" :

```bash
docker exec api bash
```

Il possible d'ouvrir une CLI avec l'id ou le nom du container

```bash
docker exec -it [nom_ou_id_container_docker] [type_d_interface]
```

Ici, pour ouvrir le CLI "web" en utilisant cette ligne de commande :

```bash
docker exec -it 1bb9b6d07c82 bash
```

Une fois dans l'interface, il est possible d'exécuter toutes les commandes correspondantes :

```bash
ping api
```

Qui nous retournera les lignes de commande de "ping"

Il est possible de tester les retours des requêtes de mon api, par exemple :

```bash
curl http://api:80/get_header
```