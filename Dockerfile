# Utiliser PHP 8.2 FPM Alpine comme image de base
FROM php:8.2-fpm-alpine

# Installer les dépendances système nécessaires
RUN apk add --no-cache \
    postgresql-dev \
    libzip-dev \
    zip \
    unzip \
    git

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application
COPY ./monitored-app /var/www/html

# Installer les dépendances du projet
RUN composer install --no-interaction --no-dev --prefer-dist

# Générer l'autoloader optimisé
RUN composer dump-autoload --optimize

# Donner les permissions nécessaires
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Créer le fichier .env si ce n'est pas déjà fait
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Générer la clé d'application
RUN php artisan key:generate --force

# Exposer le port 9000 (pour php-fpm)
EXPOSE 9000

# Le CMD sera fourni par docker-compose pour chaque service
CMD ["php-fpm"]