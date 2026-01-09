# Utiliser l'image PHP officielle avec Apache
FROM php:8.4-apache

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
# Pour Symfony Mailer : intl, mbstring
# Pour la base de données : pdo, pdo_mysql, mysqli
RUN docker-php-ext-install pdo pdo_mysql mysqli intl mbstring

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Configurer le fuseau horaire
RUN echo "date.timezone = Europe/Paris" > /usr/local/etc/php/conf.d/timezone.ini

# Copier la configuration Apache personnalisée
RUN echo '<Directory /var/www/html/public_html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/custom.conf \
    && a2enconf custom

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . /var/www/html

# Installer les dépendances Composer si elles ne sont pas présentes
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader; fi

# Donner les permissions appropriées
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Modifier la configuration Apache pour pointer vers public_html
RUN sed -i 's|/var/www/html|/var/www/html/public_html|g' /etc/apache2/sites-available/000-default.conf

# Exposer le port 80
EXPOSE 80

# Démarrer Apache
CMD ["apache2-foreground"]
