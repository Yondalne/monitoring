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

# Copier uniquement composer.json et composer.lock
COPY ./monitored-app/composer.json ./monitored-app/composer.lock ./

# Installer les dépendances du projet
RUN composer install --no-scripts --no-autoloader

# Copier le reste des fichiers de l'application
COPY ./monitored-app .

# Générer l'autoloader optimisé
RUN composer dump-autoload --optimize

# Donner les permissions nécessaires
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

EXPOSE 9000

RUN ls -la /var/www/html

CMD ["php-fpm"]