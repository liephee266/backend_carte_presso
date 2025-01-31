# Utilisez l'image officielle PHP avec FPM
FROM php:8.2-fpm

# Définir les variables d'environnement
ENV COMPOSER_MEMORY_LIMIT=-1
ENV APP_ENV=dev

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        intl \
        opcache \
        zip \
        mbstring \
        xml \
        gd \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Créer l'utilisateur non-root et configurer les permissions
RUN useradd -m -u 1000 symfony && \
    mkdir -p /var/www/project/var/cache /var/www/project/var/log && \
    chown -R symfony:symfony /var/www/project
USER symfony

# Définir le répertoire de travail
WORKDIR /var/www/project

# Copier les fichiers de dépendances en premier
COPY --chown=symfony:symfony composer.* symfony.lock ./

# Installer les dépendances
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts

# Copier tout le code source
COPY --chown=symfony:symfony . .

# Exécuter les scripts Symfony après la copie complète
RUN composer run-script post-install-cmd

# Configurer les permissions
RUN chmod -R 775 var