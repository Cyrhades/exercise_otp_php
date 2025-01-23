FROM php:8.2-fpm

ARG RUNTIME_PACKAGE_DEPS="msmtp libfreetype6 libjpeg62-turbo unzip git mariadb-client sudo rsync liblz4-tool libzip-dev ssh"
ARG BUILD_PACKAGE_DEPS="libcurl4-openssl-dev libjpeg-dev libpng-dev libxml2-dev libonig-dev"
ARG PHP_EXT_DEPS="curl xml mbstring zip bcmath soap pdo_mysql gd mysqli intl"
ARG PHP_MEMORY_LIMIT="-1"

# install dependencies and cleanup (needs to be one step, as else it will cache in the laver)
RUN apt-get update -y \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        $RUNTIME_PACKAGE_DEPS \
        $BUILD_PACKAGE_DEPS \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install -j$(nproc) $PHP_EXT_DEPS \
    && pecl install xdebug \
    && apt-get clean \
    && apt-get autoremove -y \
    && apt-get purge -y --auto-remove $BUILD_PACKAGE_DEPS \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

## remove memory limit
RUN echo "memory_limit = $PHP_MEMORY_LIMIT" > /usr/local/etc/php/conf.d/memory-limit-php.ini

# install latest composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv /var/www/html/composer.phar /usr/local/bin/composer

# Configurer Git globalement
RUN git config --global user.email "simple@user.fr" \
    && git config --global user.name "User"


COPY .htaccess /tmp/.htaccess
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]