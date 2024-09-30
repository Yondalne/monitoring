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

# Augmenter la mémoire limite de PHP
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory-limit.ini

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application
COPY ./monitored-app /var/www/html

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html

# Nettoyer le cache et les fichiers temporaires
RUN rm -rf /var/www/html/vendor
RUN rm -rf /root/.composer/cache

# Passer à l'utilisateur www-data
USER www-data

# Installer les dépendances du projet
RUN composer install --no-interaction --no-dev --prefer-source

# Générer l'autoloader optimisé
RUN composer dump-autoload --optimize

# Revenir à l'utilisateur root
USER root

# Créer le fichier .env si ce n'est pas déjà fait
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Générer la clé d'application
RUN php artisan key:generate --force

# Donner les permissions nécessaires pour les dossiers de stockage et de cache
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Exposer le port 9000 (pour php-fpm)
EXPOSE 9000

# Le CMD sera fourni par docker-compose pour chaque service
CMD ["php-fpm"]