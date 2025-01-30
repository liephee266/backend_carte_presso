# Utilisation de l'image officielle PHP avec FPM
FROM php:8.2-fpm

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Configuration des extensions PHP
RUN docker-php-ext-configure intl && \
    docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    intl \
    opcache \
    zip \
    mbstring \
    xml

# Installation de Composer depuis l'image officielle
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Création d'un utilisateur non-root
RUN useradd -m -u 1000 symfony && \
    mkdir -p /var/www/project/var && \
    chown -R symfony:symfony /var/www/project
USER symfony

# Définition du répertoire de travail
WORKDIR /var/www/project

# Copie des fichiers de configuration
COPY --chown=symfony:symfony composer.json composer.lock symfony.lock ./

# Installation des dépendances (prod)
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Copie de l'application
COPY --chown=symfony:symfony . .

# Configuration des permissions
RUN mkdir -p var/cache var/log && \
    chmod -R 775 var